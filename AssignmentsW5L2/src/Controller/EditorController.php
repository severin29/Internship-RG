<?php

namespace App\Controller;

use App\Entity\Editor;
use App\Form\EditorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditorController extends AbstractController
{
    #[Route('/editors/', name: 'editor_index')]
    public function readEditors(EntityManagerInterface $em):Response
    {
        $editors = $em->getRepository(Editor::class)->findAll();
        return $this->render('editor/index.html.twig',
            ['editors' => $editors]);
    }

    #[Route('/editors/create', name: 'editor_create')]
    public function createEditor(Request $request, EntityManagerInterface $em):Response
    {
        $editor = new Editor();
        $form = $this->createForm(EditorType::class, $editor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($editor);
            $em->flush();
            return $this->redirectToRoute('editor_index');
        }
        return $this->render('editor/create.html.twig', ['form' => $form->createView()]);
    }


   #[Route('/editors/edit/{id}', name: 'editor_update')]
    public function updateEditor(Request $request, EntityManagerInterface $em, $id){
        $editor = $em->getRepository(Editor::class)->find($id);
        $form = $this->createForm(EditorType::class, $editor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('editor_index');
        }
        return $this->render('editor/edit.html.twig', ['form' => $form->createView()]);
   }

   #[Route('/editors/delete/{id}', name: 'editor_delete')]
    public function deleteEditor(Request $request, EntityManagerInterface $em, $id)
   {
       $editor = $em->getRepository(Editor::class)->find($id);
       $em->remove($editor);
       $em->flush();
       return $this->redirectToRoute('editors_read');
   }
}
