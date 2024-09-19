<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;



class UserController extends AbstractController
{
    #[Route('/users', name: 'list_users')]
    #[IsGranted("ROLE_ADMIN")]
    public function index(EntityManagerInterface $em): Response
    {
        if($this->getUser()->getRoles()[0] !== "ROLE_ADMIN"){
            return $this->redirectToRoute('posts_list');
        }

        $users = $em->getRepository(User::class)->findAll();

        return $this->render('user/index.html.twig', ['users' => $users]);


    }

    #[Route('/users/edit/{id}', name: 'edit_users')]
    public function editUser(EntityManagerInterface $em, $id, Request $request): Response
    {
        if($this->getUser()->getRoles()[0] !== "ROLE_ADMIN"){
            return $this->redirectToRoute('posts_list');
        }
        $user = $em->getRepository(User::class)->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em->flush();
            return $this->redirectToRoute('list_users');
        }

        return $this->render('user/edit.html.twig', ['user' => $user, 'form' => $form->createView()]);
    }

    #[Route('/delete/{id}', name: 'delete_user')]
    public function deleteUser(EntityManagerInterface $em, $id): Response
    {
        if($this->getUser()->getRoles()[0] !== "ROLE_ADMIN"){
            return $this->redirectToRoute('list_users');
        }
        $user = $em->getRepository(User::class)->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('users');
    }
}
