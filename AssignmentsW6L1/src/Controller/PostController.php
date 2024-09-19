<?php

namespace App\Controller;

use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Post;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/posts')]
class PostController extends AbstractController
{

    #[Route('/', name: 'posts_list')]
    public function listPosts(EntityManagerInterface $em): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }
       $posts = $em->getRepository(Post::class)->findAll();
       return $this->render('post/index.html.twig', ['posts' => $posts]);
    }

    #[Route('/list/{id}', name: 'list_post')]
    public function listPost(EntityManagerInterface $em, $id): Response
    {
        $post = $em->getRepository(Post::class)->findBy($id);
        return $this->render('post/index.html.twig', ['posts' => $post]);
    }

    #[Route('/author/{id}', name: 'post_by_author', methods: ['GET'])]
    public function postsByAuthor(EntityManagerInterface $em, User $author){
        $posts = $em->getRepository(Post::class)->findBy(['author' => $author]);
        return $this->render('post/index.html.twig', ['posts' => $posts, 'author' => $author]);
    }

    #[Route('/create', name: 'post_create')]
    #[IsGranted('ROLE_AUTHOR')]
    public function createPost(Request $request, EntityManagerInterface $em): Response
    {
        if(!$this->isGranted('ROLE_ADMIN') || !$this->isGranted('ROLE_AUTHOR') ){
            return $this->redirectToRoute('posts_list');
            $this->addFlash('Denial', 'You cannot create a post!');
        }
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setAuthor($this->getUser());
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('posts_list');
        }
        return $this->render('post/create.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/edit/{id}', name: 'post_edit')]
    public function editPost(Post $post, Request $request, EntityManagerInterface $em): Response{

        $post = $em->getRepository(Post::class)->find($post->getId());

        if($post->getAuthor() !== $this->getUser() && !$this->isGranted('ROLE_ADMIN')){
            return $this->redirectToRoute('posts_list');
            $this->addFlash('Denial', 'You cannot create a post!');
        }
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('posts_list');
        }
        return $this->render('post/edit.html.twig', ['form' => $form->createView(), 'post' => $post]);
    }


    #[Route('/delete/{id}', name: 'post_delete')]
    public function deletePost(Post $post, EntityManagerInterface $em): Response
    {
        if($post->getAuthor() !== $this->getUser() && !$this->isGranted('ROLE_ADMIN')){
            return $this->redirectToRoute('posts_list');
            $this->addFlash('Denial', 'You cannot create a post!');

        }

        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute('posts_list');
    }



}
