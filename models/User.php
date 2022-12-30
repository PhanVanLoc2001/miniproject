<?php

require 'models/UserObject.php';
require_once 'models/Connect.php';
class User
{
    public function all():array
    {
        $sql = "SELECT * FROM user";
        $result = (new Connect())->select($sql);

        $arr = [];
        foreach($result as $row){
            $object = new UserObject($row);
            $arr[] = $object;
        }
        return $arr;
    }

    public function logup($params)
    {
        $object = new UserObject($params);
        $sql = "select count(*)from user where email = '".$object->getEmail()."'";
        $result = (new Connect())->select($sql);
        $number_row = mysqli_fetch_array($result)["count(*)"];

        if($number_row === 1){
            header("location:?controller=UserController&action=signup&error=Email đã tồn tại!");
            exit;
        }
        $sql = "select ID from user where email = '".$object->getEmail()."'";
        $result = (new Connect())->select($sql);
        $id = mysqli_fetch_array($result)["ID"];
        $sql = "insert into user(name, email, password) values ('".$object->getName()."','".$object->getEmail()."','".$object->getPassword()."')";
        (new Connect())->execute($sql);
    }

    public function signin($params)
    {
        $object = new UserObject($params);
        $sql = "select * from user where email = '".$object->getEmail()."' and password = '".$object->getPassword()."'";
        $result = (new Connect())->select($sql);
        $number_row = mysqli_num_rows($result);

        if($number_row === 1){
            session_start();
            $each = mysqli_fetch_array($result);
            $_SESSION['ID'] = $each['ID'];
            $_SESSION['name'] = $each['name'];
            if(!empty($_POST["remember-me"])) {
                setcookie ("email",$_POST["email"],time()+ 3600);
                setcookie ("password",$_POST["password"],time()+ 3600);
            }
            header("location:?controller=UserController&action=user");
            exit;
        }

        header("location:?controller=UserController&action=signin&error=Tài khoản hoặc mật khẩu không chính xác!");
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function find($id):object
    {
        $sql = "select * from user where ID = '$id'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return new UserObject($each);
    }

    public function update($params):void
    {
        $object = new UserObject($params);
        $sql = "update user set name = '".$object->getName()."', email = '".$object->getEmail()."' where ID = '".$object->getId()."'";
        (new Connect())->execute($sql);
    }

    public function delete($ID):void
    {
        $sql = "delete from user where ID = '$ID'";
        (new Connect())->execute($sql);
    }


}