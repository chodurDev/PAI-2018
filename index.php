<?php

class User{
    private $name;
    private $surname;
    private $email;
    private $password;


    public function __construct(string $name,string $password){
        $this->name=$name;
        $this->password=md5($password);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name):void
    {
        $this->name=$name;
    }

    public function setPassword($password):void
    {
        $this->password=md5($password);
    }
} 

$user=new User(name:'kamil',password:'secret');





?>