<?php

class User
{
    public $username;
    public $password;
    public $name;

    public function __construct($username, $password, $name)
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
    }

    public function login($username, $password)
    {
        return $this->username === $username && $this->password === $password;
    }
}