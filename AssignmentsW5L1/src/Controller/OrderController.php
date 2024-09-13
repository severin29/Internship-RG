<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Order;
use DateTime;
use App\Enum\OrderStatus;
use App\Repository\OrderRepository;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/api/orders", name: "api_orders")]

class OrderController extends AbstractController
{
    /*#[Route('/order', name: 'app_order')]
    public function index(): Response
    {
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }*/

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route("/", name: "get_all_orders", methods: ["GET"])]
    public function getAllOrders(SerializerInterface $serializer): JsonResponse{
        $orders = $this->em->getRepository(Order::class)->findAll();

        $json = $serializer->serialize($orders, 'json', ['groups' => 'order']);
        return new JsonResponse($json, 200, [], true);
    }

    #[Route("/{id}", name: "get_order", methods: ["GET"])]
    public function getOrder(SerializerInterface $serializer, $id): JsonResponse{
        $order = $this->em->getRepository(Order::class)->find($id);

        if (!$order) {
            return new JsonResponse('Order not found', 404);
        }
        $json = $serializer->serialize($order, 'json', ['groups' => 'order']);
        return new JsonResponse($json, 200, [], true);
    }

    #[Route("/", name: "create_order", methods: ["POST"])]
    public function createOrder(Request $request): JsonResponse{
        $data = json_decode($request->getContent(), true);
        print_r($data);
        if(empty($data['customer'])){
            return new JsonResponse("Invalid data", 400);
        }
        $order = new Order();
        $order->setCustomer($this->em->getRepository(Customer::class)->findOneBy(["name"=>$data["customer"]]));
        $order->setOrderDate(new \DateTime($data["order_date"]));
        $order->setTotal($data["total"]);
        $order->setStatus(OrderStatus::from($data['status']));
        $this->em->persist($order);
        $this->em->flush();

        return new JsonResponse("Order created", 201);
    }

    #[Route("/{id}", name: "update_order", methods: ["PUT"])]
    public function updateCategory(Request $request, $id): JsonResponse{

        $order = $this->em->getRepository(Order::class)->find($id);

        if(!$order){
            return new JsonResponse("Order not found", 404);
        }

        $data = json_decode($request->getContent(), true);

        if(empty($data["customer"])){
            return new JsonResponse("Invalid data", 400);
        }

        $order->setCustomer($this->em->getRepository(Customer::class)->findOneBy(["name"=>$data["customer"]]));
        $order->setOrderDate(new \DateTime($data["order_date"]));
        $order->setTotal($data["total"]);
        $order->setStatus(OrderStatus::from($data['status']));
        $this->em->flush();

        return new JsonResponse("Order updated", 201);
    }


    #[Route("/{id}", name: "delete_order", methods: ["DELETE"])]
    public function deleteOrder(Request $request, $id): JsonResponse{

        $order = $this->em->getRepository(Order::class)->find($id);

        if(!$order){
            return new JsonResponse("Order not found", 404);
        }

        $this->em->remove($order);
        $this->em->flush();

        return new JsonResponse("Order deleted", 201);
    }

}
