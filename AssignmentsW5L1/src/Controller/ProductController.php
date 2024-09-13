<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/api/products", name: "api_products")]

class ProductController extends AbstractController
{
    /*#[Route('/p/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'PProductController',
        ]);
    }*/

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route("/", name: "get_all_products", methods: ["GET"])]
    public function getAllProducts(SerializerInterface $serializer): JsonResponse{
        $products = $this->em->getRepository(Product::class)->findAll();

        $json = $serializer->serialize($products, 'json', ['groups' => 'product']);
        return new JsonResponse($json, 200, [], true);
    }


    #[Route("/{id}", name: "get_product", methods: ["GET"])]
    public function getProduct(SerializerInterface $serializer, $id): JsonResponse{
        $product = $this->em->getRepository(Product::class)->find($id);

        if(!$product){
            return new JsonResponse("Product not found", 404);
        }

        $json = $serializer->serialize($product, 'json', ['groups' => 'product']);
        return new JsonResponse($json, 200, [], true);
    }


    #[Route("/", name: "create_product", methods: ["POST"])]
    public function createProduct(Request $request): JsonResponse{
        $data = json_decode($request->getContent(), true);
        if(empty($data["name"])){

            return new JsonResponse("Invalid data", 400);
        }
        $product = new Product();
        $product->setCategory($this->em->getRepository(Category::class)->findOneBy(["name"=>$data["Category"]]));
        $product->setName($data["name"]);
        $product->setPrice($data["price"]);
        $product->setQuantity($data['quantity']);
        $product->setDescription($data["description"]);
        $this->em->persist($product);
        $this->em->flush();

        return new JsonResponse("Product created", 201);
    }

    #[Route("/{id}", name: "update_product", methods: ["PUT"])]
    public function updateProduct(Request $request, $id): JsonResponse{

        $product = $this->em->getRepository(Product::class)->find($id);

        if(!$product){
            return new JsonResponse("Product not found", 404);
        }

        $data = json_decode($request->getContent(), true);

        if(empty($data["name"])){
            return new JsonResponse("Invalid data", 400);
        }

        $product->setName($data["name"]);
        $product->setCategory($this->em->getRepository(Category::class)->findOneBy(["name"=>$data["Category"]]));
        $product->setQuantity($data["quantity"]);
        $product->setPrice($data["price"]);
        $product->setDescription($data["description"]);
        $this->em->flush();

        return new JsonResponse("Product updated", 201);
    }

    #[Route("/{id}", name: "delete_product", methods: ["DELETE"])]
    public function deleteProduct(Request $request, $id): JsonResponse{

        $product = $this->em->getRepository(Product::class)->find($id);

        if(!$product){
            return new JsonResponse("Product not found", 404);
        }

        $this->em->remove($product);
        $this->em->flush();

        return new JsonResponse("Product deleted", 201);
    }

}
