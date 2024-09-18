<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\ChangePasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;

    private ResetPasswordHelperInterface $resetPasswordHelper;
    private UserRepository $userRepository;
    private EntityManagerInterface $em;

    public function __construct(ResetPasswordHelperInterface $resetPasswordHelper, UserRepository $userRepository)
    {

        $this->resetPasswordHelper = $resetPasswordHelper;
        $this->userRepository = $userRepository;

    }

    #[Route('', name: 'app_forgot_password_request')]
    public function request(Request $request): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();

            $user = $this->userRepository->findOneByEmail($email);

            if ($user) {
                $resetToken = $this->resetPasswordHelper->generateResetToken($user);

                $this->addFlash('success', 'Here is your password reset token: ' . $resetToken->getToken());

                $request->getSession()->set('reset_password_token', $resetToken->getToken());

                return $this->redirectToRoute('app_reset_password', ['token' => $resetToken->getToken()]);
            }

            $this->addFlash('danger', 'User with this email does not exist.');
        }

        return $this->render('reset_password/request.html.twig', [
            'requestForm' => $form->createView(),
        ]);
    }

    /**
     * Confirmation page after a user has requested a password reset.
     */
//    #[Route('/check-email', name: 'app_check_email', methods: 'GET')]
//    public function checkEmail(): Response
//    {
//        // Generate a fake token if the user does not exist or someone hit this page directly.
//        // This prevents exposing whether or not a user was found with the given email address or not
//        if (null === ($resetToken = $this->getTokenObjectFromSession())) {
//            $resetToken = $this->resetPasswordHelper->generateFakeResetToken();
//        }
//
//        return $this->render('reset_password/check_email.html.twig', [
//            'resetToken' => $resetToken,
//        ]);
//    }

    /**
     * Validates and process the reset URL that the user clicked in their email.
     */
    #[Route('/reset/{token}', name: 'app_reset_password')]
    public function reset(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em, TranslatorInterface $translator, ?string $token = null): Response
    {
        if ($token) {
            // We store the token in session and remove it from the URL, to avoid the URL being
            // loaded in a browser and potentially leaking the token to 3rd party JavaScript.
            $this->storeTokenInSession($token);

            return $this->redirectToRoute('app_reset_password');
        }

        $token = $this->getTokenFromSession();

        if (null === $token) {
            throw $this->createNotFoundException('No reset password token found in the URL or in the session.');
        }

        try {
            /** @var User $user */
            $user = $this->resetPasswordHelper->validateTokenAndFetchUser($token);
        } catch (ResetPasswordExceptionInterface $e) {
            $this->addFlash('reset_password_error', sprintf(
                '%s - %s',
                $translator->trans(ResetPasswordExceptionInterface::MESSAGE_PROBLEM_VALIDATE, [], 'ResetPasswordBundle'),
                $translator->trans($e->getReason(), [], 'ResetPasswordBundle')
            ));

            return $this->redirectToRoute('app_forgot_password_request');
        }

        // The token is valid; allow the user to change their password.
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // A password reset token should be used only once, remove it.
            $this->resetPasswordHelper->removeResetRequest($token);

            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // Encode(hash) the plain password, and set it.
            $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
            $em->flush();

            // The session is cleaned up after the password has been changed.
            $this->cleanSessionAfterReset();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form,
            'resetToken' => $token,
        ]);
    }

//    private function processSendingPasswordResetEmail($user): void
//    {
//        // Generate reset token
//        try {
//            $resetToken = $this->resetPasswordHelper->generateResetToken($user);
//        } catch (ResetPasswordExceptionInterface $e) {
//            $this->addFlash('danger', sprintf('There was a problem handling your password reset request: %s', $e->getReason()));
//            return;
//        }
//
//        // Create and send the reset email
//        $email = (new Email())
//            ->from('no-reply@example.com')
//            ->to($user->getEmail())
//            ->subject('Your password reset request')
//            ->html($this->renderView('reset_password/email.html.twig', [
//                'resetToken' => $resetToken->getToken(),
//            ]));
//
//        $this->mailer->send($email);
//    }
}