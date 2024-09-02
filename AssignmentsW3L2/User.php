<?php

class User
{
    protected $username;
    protected $password;
    protected $role;

    public function __construct($username, $password, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getRole() {
        return $this->role;
    }

    public function verifyPassword($password) {
        return $this->password === $password;
    }

}