<?php

namespace App\Controller;

use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Comment;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/comments')]
class CommentController extends AbstractController
{
    #[Route('', name: 'list_comments', methods: ['GET'])]
    public function listComments(EntityManagerInterface $em): Response
    {
        $comments = $em->getRepository(Comment::class)->findAll();
        return $this->render('comment/index.html.twig', ['comments' => $comments]);
    }

    #[Route('/{id}', name: 'list_comment', methods: ['GET'])]
    public function listComment(EntityManagerInterface $em, $id): Response
    {
        $comment = $em->getRepository(Comment::class)->findBy($id);
        return $this->render('comment/index.html.twig', ['comments' => $comment]);
    }

    #[Route('/author/{id}', name: 'comment_by_user', methods: ['GET'])]
    public function postsByAuthor(EntityManagerInterface $em, User $author){
        $posts = $em->getRepository(Comment::class)->findBy(['author' => $author]);
        return $this->render('post/index.html.twig', ['posts' => $posts, 'author' => $author]);
    }
    #[Route('/create', name: 'comment_create')]
    public function createComment(Request $request, EntityManagerInterface $em): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setAuthor($this->getUser());
            $post = $em->getRepository(Post::class)->find($comment->getPost());
            $comment->setPost($post);
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('comment_list');
        }
        return $this->render('comment/create.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/edit/{id}', name: 'comment_edit', methods: ['POST'])]
    public function editComment(Comment $comment, Request $request, EntityManagerInterface $em): Response{

        if($comment->getAuthor() !== $this->getUser() && !$this->isGranted('ROLE_ADMIN')){
            throw $this->createAccessDeniedException('You can not edit this comment');
        }
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('comment_list');
        }
        return $this->render('comment/edit.html.twig', ['form' => $form->createView()]);
    }


    #[Route('/delete/{id}', name: 'comment_delete', methods: ['POST'])]
    public function deleteComment(Comment $comment, EntityManagerInterface $em): Response
    {
        $post = $comment->getPost();
        $currentUser = $this->getUser();
        if ($post->getAuthor() !== $currentUser && $comment->getAuthor() !== $currentUser && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('You can not delete this comment');
        }
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('list_post', ['id' => $post->getId()]);
    }



}
