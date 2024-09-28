<?php

namespace Entity;

use App\Entity\Comment;
use App\Entity\Post;
use PHPUnit\Framework\TestCase;
use App\Entity\User;
class CommentTest extends TestCase
{

    public function testSetAuthor()
    {
        $comment = new Comment();
        $user = new User();
        $comment->setAuthor($user);
        $this->assertSame($user, $comment->getAuthor());


    }

    public function testSetContent()
    {
        $comment = new Comment();
        $comment->setContent('Test comment');
        $this->assertSame('Test comment', $comment->getContent());
    }

    public function testGetAuthor()
    {
        $comment = new Comment();
        $user = new User();
        $comment->setAuthor($user);
        $this->assertSame($user, $comment->getAuthor());
    }

    public function testGetPost()
    {
        $comment = new Comment();
        $post = new Post();
        $comment->setPost($post);
        $this->assertSame($post, $comment->getPost());
    }

    public function testSetPost()
    {
        $comment = new Comment();
        $post = new Post();
        $comment->setPost($post);
        $this->assertSame($post, $comment->getPost());
    }


    public function testGetContent()
    {
        $comment = new Comment();
        $comment->setContent('Test comment');
        $this->assertSame('Test comment', $comment->getContent());
    }

    public function testSetRating()
    {
        $comment = new Comment();
        $comment->setRating(5);
        $this->assertSame(5, $comment->getRating());
    }

    public function testGetRating()
    {
        $comment = new Comment();
        $comment->setRating(5);
        $this->assertSame(5, $comment->getRating());
    }
}
