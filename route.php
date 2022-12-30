<?php
require 'controller/UserController.php';
require 'controller/BookController.php';


$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        (new UserController())->index();
        break;
    case 'signup':
            (new UserController())->logup();
        break;
    case 'process_signup':
        (new UserController())->process_signup();
        break;
    case 'signin':
            (new UserController())->signin();
        break;
    case 'process_signin':
        (new UserController())->process_signin();
        break;
    case 'user':
            (new UserController())->user();
        break;
    case 'view_user':
        (new UserController())->view_user();
        break;
    case 'process_signout':
            (new UserController())->process_signout();
        break;
    case 'edit_user':
        (new UserController())->edit_user();
        break;
    case 'process_update':
            (new UserController())->process_update();
        break;
    case 'del_user':
            (new UserController())->del_user();
        break;
    case 'view_book':
            (new BookController())->view_book();
            break;
    case 'create_book':
             (new BookController())->create_book();
             break;
    case 'update_book':
            (new BookController())->update_book();
            break;
    case 'delete_book':
        (new BookController())->delete_book();
        break;
    default:
        echo 'Chua co action';
        break;
}
