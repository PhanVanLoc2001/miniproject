<?php
class UserObject
{
    private $name;
    private $email;
    private $password;
    private $id;
    public function __construct($row){
        $this->id = $row['ID'];
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->password = $row['password'];
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId(mixed $var): void
    {
        $this->id = $var;
    }
    public function getName(){
        return $this->name;
    }

    public function setName($var): void
    {
        $this->name = $var;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($var): void
    {
        $this->email = $var;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($var):void
    {
        $this->password = $var;
    }

}