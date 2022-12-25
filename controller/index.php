<?php
    $controller="";
    if(isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        switch ($controller) {
            case 'UserController':
                require 'controller/UserController.php';
                break;
            case 'BookController':
                require 'controller/BookController.php';
                break;
            default:
                header("location: ?controller=UserController&action=user");

        }
    }
    else{
        header("location: ?controller=UserController&action=user");
    }
?>