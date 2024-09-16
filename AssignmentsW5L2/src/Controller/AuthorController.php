<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Author;
use App\Repository\AuthorRepository;
use App\Form\AuthorType;


class AuthorController extends AbstractController
{
    #[Route('/authors', name: 'authors_index')]
    public function readAuthors(EntityManagerInterface $em): Response
    {

        $authors = $em->getRepository(Author::class)->findAll();

        return $this->render('author/index.html.twig', [
            'authors' => $authors
        ]);
    }

    #[Route('/authors/create', name: 'author_create')]
    public function createAuthor(Request $request, EntityManagerInterface $em): Response
    {

        dump('Create method hit');

        $author = new Author();

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($author);
            $em->flush();
            return $this->redirectToRoute('authors_index');
        }

        return $this->render('author/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    #[Route('/authors/edit/{id}', name: 'author_edit')]
    public function editAuthor(Request $request, EntityManagerInterface $em, $id): Response
    {
        $author = $em->getRepository(Author::class)->find($id);

        if(!$author){
            throw $this->createNotFoundException('Author not found');
        }

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('authors_index');
        }

        return $this->render('author/edit.html.twig', [
            'form' => $form->createView(),
            'author' => $author
        ]);

    }

    #[Route('/authors/delete/{id}', name: 'author_delete')]
    public function deleteAuthor(Request $request, EntityManagerInterface $em, $id): Response
    {
        $author = $em->getRepository(Author::class)->find($id);
        if(!$author){
            throw $this->createNotFoundException('Author not found');
        }

        if($this->isCsrfTokenValid('delete'.$author->getId(), $request->request->get('_token'))) {
            $em->remove($author);
            $em->flush();
        }

        return $this->redirectToRoute('authors_index');
    }





}
