<?php

namespace App\Tests;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{

    public function testGetContent()
    {
        $post = new Post();
        $post->setContent('Hello World!');
        $this->assertSame('Hello World!', $post->getContent());

    }

    public function testAddComment()
    {
        $post = new Post();
        $comment = new Comment();
        $post->addComment($comment);
        $this->assertSame($comment, $post->getComments()[0]);
    }

    public function testRemoveComment()
    {
        $post = new Post();
        $comment = new Comment();
        $post->addComment($comment);
        $post->removeComment($comment);
        $this->assertNull($post->getComments()[0]);
    }

    public function testGetTitle()
    {
        $post = new Post();
        $post->setTitle('Hello World!');
        $this->assertSame('Hello World!', $post->getTitle());
    }

    public function testGetComments()
    {
        $post = new Post();
        $comment1 = new Comment();

        $post->addComment($comment1);

        $comments = $post->getComments();

        $this->assertTrue($comments->contains($comment1));
    }

    public function testGetAverageRating()
    {
        $post = new Post();
        $comment1 = new Comment();
        $comment2 = new Comment();
        $comment1->setRating(3);
        $comment2->setRating(2);
        $post->addComment($comment1);
        $post->addComment($comment2);
        $this->assertSame(2.5, $post->getAverageRating());

    }

    public function testSetAuthor()
    {
        $post = new Post();
        $user = new User();
        $post->setAuthor($user);
        $this->assertSame($user, $post->getAuthor());
    }



    public function testSetTitle()
    {
        $post = new Post();
        $post->setTitle('Hello World!');
        $this->assertSame('Hello World!', $post->getTitle());
    }

    public function testSetContent()
    {
        $post = new Post();
        $post->setContent('Hello World!');
        $this->assertSame('Hello World!', $post->getContent());
    }

    public function testGetAuthor()
    {
        $post = new Post();
        $user = new User();
        $post->setAuthor($user);
        $this->assertSame($user, $post->getAuthor());
    }
}
