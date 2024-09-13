<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\SerializerInterface;


#[Route("/api/categories", name: "api_category")]

class CategoryController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route("/", name: "get_all_categories", methods: ["GET"])]
    public function getAllCategories(SerializerInterface $serializer): JsonResponse{
        $categories = $this->em->getRepository(Category::class)->findAll();

        $json = $serializer->serialize($categories, 'json', ['groups'=>'category']);
        return new JsonResponse($json, 200, [], true);
    }


    #[Route("/{id}", name: "get_category", methods: ["GET"])]
    public function getCategory(SerializerInterface $serializer,$id): JsonResponse{
        $category = $this->em->getRepository(Category::class)->find($id);

        if(!$category){
            return new JsonResponse("Category not found", 404);
        }

        $json = $serializer->serialize($category, 'json', ['groups'=>'category']);
        return new JsonResponse($json, 200, [], true);
    }

    #[Route("/", name: "create_category", methods: ["POST"])]
    public function createCategory(Request $request): JsonResponse{
        $data = json_decode($request->getContent(), true);
        if(empty($data["name"])){
            return new JsonResponse("Invalid data", 400);
        }
        $category = new Category();
        $category->setName($data["name"]);
        $category->setDescription($data["description"]);
        $this->em->persist($category);
        $this->em->flush();

        return new JsonResponse("Category created", 201);
    }

    #[Route("/{id}", name: "update_category", methods: ["PUT"])]
    public function updateCategory(Request $request, $id): JsonResponse{

        $category = $this->em->getRepository(Category::class)->find($id);

        if(!$category){
            return new JsonResponse("Category not found", 404);
        }

        $data = json_decode($request->getContent(), true);

        if(empty($data["name"])){
            return new JsonResponse("Invalid data", 400);
        }

        $category->setName($data["name"]);
        $category->setDescription($data["description"]);
        $this->em->flush();

        return new JsonResponse("Category updated", 201);
    }

    #[Route("/{id}", name: "delete_category", methods: ["DELETE"])]
    public function deleteCategory(Request $request, $id): JsonResponse{

        $category = $this->em->getRepository(Category::class)->find($id);

        if(!$category){
            return new JsonResponse("Category not found", 404);
        }

        $this->em->remove($category);
        $this->em->flush();

        return new JsonResponse("Category deleted", 201);
    }
    #[Route('/showcategory/{name}', name: 'app_category')]
    public function index(Category $category): Response
    {
        return $this->render('category/index.html.twig', ['category'=>$category]);

    }

}
