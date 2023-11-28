<?php

class User{
    public $username;
    public $password;
    public function __construct($username, $password)
    {
        $this->username= $username;
        $this->password=$password;
    }

    public function info(){
        return "Username: $this->username, Parol: $this->password \n";
    }
}