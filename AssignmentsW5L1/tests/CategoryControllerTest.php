<?php


use App\Controller\CategoryController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class CategoryControllerTest extends WebTestCase
{

    public function testDeleteCategory()
    {

    }

    public function testGetCategory()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/api/categories/1' );

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testUpdateCategory()
    {

    }

    public function testGetAllCategories()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/api/categories/' );

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testCreateCategory()
    {
        $category = ['name' => 'test category', 'description' => 'test description'];
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('POST', '/api/categories/', $category);
        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json', 'charset/utf-8');
        $this->assertJson($client->getResponse()->getContent());
    }
}
