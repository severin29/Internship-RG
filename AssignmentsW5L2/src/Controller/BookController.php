<?php

namespace App\Controller;

use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;

class BookController extends AbstractController
{
    #[Route('/books/', name: 'books_index')]
    public function readBooks(EntityManagerInterface $em): Response
    {
        $books = $em->getRepository(Book::class)->findAll();

        return $this->render('book/index.html.twig',
            ['books' => $books]);
    }


    #[Route('/books/create/', name: 'book_create')]
    public function createBook(Request $request, EntityManagerInterface $em): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute('books_index');
        }
        return $this->render('book/create.html.twig', ['form' => $form->createView()]);
    }


    #[Route('/books/edit/{id}', name: 'book_update')]
    public function updateBook(Request $request, EntityManagerInterface $em, $id): Response
    {
        $book = $em->getRepository(Book::class)->find($id);

        if(!$book){
            throw $this->createNotFoundException('Book not found');
        }

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();
            return $this->redirectToRoute('books_index');
        }
        return $this->render('book/edit.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/books/delete/{id}', name: 'book_delete')]
    public function deleteBook(Request $request, EntityManagerInterface $em, $id): Response
    {
        $book = $em->getRepository(Book::class)->find($id);
        if(!$book){
            throw $this->createNotFoundException('Book not found');
        }
        $em->remove($book);
        $em->flush();
        return $this->redirectToRoute('books_index');
    }
}
