<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route("/api/customers", name: "api_customer")]
class CustomerController extends AbstractController
{
    /*#[Route('/customer', name: 'app_customer')]
    public function index(): Response
    {
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }*/


    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route("/list", name: "get_all_customers", methods: ["GET"])]
    public function getAllCategories(SerializerInterface $serializer): JsonResponse{
        $customers = $this->em->getRepository(Customer::class)->findAll();

        $json = $serializer->serialize($customers, 'json', ['groups'=>'customer']);
        return new JsonResponse($json, 200, [], true);
    }


    #[Route("/list/{id}", name: "get_customer", methods: ["GET"])]
    public function getCustomer(SerializerInterface $serializer,$id): JsonResponse{
        $customer = $this->em->getRepository(Customer::class)->find($id);

        if(!$customer){
            return new JsonResponse("Customer not found", 404);
        }

        $json = $serializer->serialize($customer, 'json', ['groups'=>'customer']);
        return new JsonResponse($json, 200, [], true);
    }

    #[Route("/create", name: "create_customer", methods: ["POST"])]
    public function createCustomer(Request $request): JsonResponse{
        $data = json_decode($request->getContent(), true);

        if(empty($data["name"])){
            return new JsonResponse("Invalid data", 400);
        }
        $customer = new Customer();
        $customer->setName($data["name"]);
        $customer->setEmail($data["email"]);
        $customer->setPhone($data["phone"]);
        $customer->setAddress($data["address"]);
        $this->em->persist($customer);
        $this->em->flush();

        return new JsonResponse("Customer created", 201);
    }

    #[Route("/edit/{id}", name: "update_customer", methods: ["PUT"])]
    public function updateCustomer(Request $request, $id): JsonResponse{

        $customer = $this->em->getRepository(Customer::class)->find($id);

        if(!$customer){
            return new JsonResponse("Customer not found", 404);
        }

        $data = json_decode($request->getContent(), true);

        if(empty($data["name"])){
            return new JsonResponse("Invalid data", 400);
        }

        $customer->setName($data["name"]);
        $customer->setEmail($data["email"]);
        $customer->setPhone($data["phone"]);
        $customer->setAddress($data["address"]);
        $this->em->flush();

        return new JsonResponse("Customer updated", 201);
    }

    #[Route("/delete/{id}", name: "delete_customer", methods: ["DELETE"])]
    public function deleteCustomer(Request $request, $id): JsonResponse{

        $customer = $this->em->getRepository(Customer::class)->find($id);

        if(!$customer){
            return new JsonResponse("Customer not found", 404);
        }

        $this->em->remove($customer);
        $this->em->flush();

        return new JsonResponse("Customer deleted", 201);
    }
}
