<?php
class UserController
{
    public function index():void
    {
       require 'models/User.php';
       $arr = (new User())->all();
       require 'views/users/index.php';
    }

    public function logup():void
    {
        require 'views/users/logup.php';
    }

    public function process_signup():void
    {
        require 'models/User.php';
        (new User())->logup($_POST);
        header('Location:?controller=UserController&action=signin');
    }

    public function signin():void
    {
        require 'views/users/signin.php';
    }

    public function process_signin():void
    {
        require 'models/User.php';
        (new User())->signin($_POST);
    }

    public function user():void
    {
        require 'views/users/page_user.php';
    }

    public function view_user():void
    {
        require 'models/User.php';
        $arr = (new User())->all();
        require 'views/users/view_user.php';
    }

    public function process_signout()
    {
        require 'models/User.php';
        (new User())->logout($_POST);
        require 'views/users/signin.php';
    }

    public function edit_user():void
    {
        $id = $_GET['ID'];
        require 'models/User.php';
        $each = (new User())->find($id);
        require 'views/users/form_update_user.php';
    }

    public function process_update():void
    {
        require 'models/User.php';
        (new User())->update($_POST);
        header("location:?controller=UserController&action=view_user");
    }

    public function del_user():void
    {
        require 'models/User.php';
        (new User())->delete($_GET['ID']);
        header("location:?controller=UserController&action=view_user");
    }


}