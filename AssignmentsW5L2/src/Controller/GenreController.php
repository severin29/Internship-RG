<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Genre;
use App\Form\GenreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;


class GenreController extends AbstractController
{
    #[Route('/genres/', name: 'genres_index')]
    public function readGenres(EntityManagerInterface $em):Response
    {
        $genres = $em->getRepository(Genre::class)->findAll();
        $books = $em->getRepository(Book::class)->findAll();

        return $this->render('genre/index.html.twig',
            ['genres' => $genres,
            'books' => $books]);
    }

    #[Route('/genres/create', name: 'genre_create')]
    public function createGenre(Request $request, EntityManagerInterface $em):Response
    {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($genre);
            $em->flush();
        }
        return $this->render('genre/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/genres/edit{id}', name: 'genre_edit')]
    public function editGenre(Request $request, EntityManagerInterface $em, $id):Response
    {
        $genre = $em->getRepository(Genre::class)->find($id);
        if(!$genre) {
            throw $this->createNotFoundException('No genre found');
        }

        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
        }
        return $this->render('genre/edit.html.twig',);
    }

    #[Route('/genres/delete{id}', name: 'genre_delete')]
    public function deleteGenre(Request $request, EntityManagerInterface $em, $id)
    {
        $genre = $em->getRepository(Genre::class)->find($id);
        if(!$genre) {
            throw $this->createNotFoundException('No genre found');
        }
        $em->remove($genre);
        $em->flush();
        return $this->redirectToRoute('genres_index');
    }

}
