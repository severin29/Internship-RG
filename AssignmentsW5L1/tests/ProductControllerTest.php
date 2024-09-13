<?php

namespace App\Controller;

use App\Controller\ProductController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{

    public function testGetProduct()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/api/products/1');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testGetAllProducts()
    {
        $client = static::createClient();
        $client->request('GET', '/api/products/');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testDeleteProduct()
    {
        $client = static::createClient();
        $client->request('DELETE', '/api/products/1');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testCreateProduct()
    {
        $product = ['Category_id' => 1, 'name' => 'test product2', 'price' => "20.9", 'quantity' => "20", 'description' => 'test product2'];
        $client = static::createClient();
        $client->request('POST', '/api/products/', $product);

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testUpdateProduct()
    {
        $product = ['Category_id' => 1, 'name' => ' edited test product2', 'price' => "20.9", 'quantity' => "20", 'description' => 'test product2'];
        $client = static::createClient();
        $client->request('PUT', '/api/products/1', $product);

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }
}

