<?php
require_once "model/Book.php";

$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action) {
    case 'view_book':
        $data = Book::getAll();
        require 'view/book/view_book.php';
        break;
    case 'get_create':
        require 'view/book/create_book.php';
        break;
    case 'create':
        if(isset($_POST['btnSubmitBook'])){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $published_date = $_POST['published_date'];
            $publisher = $_POST['publisher'];
            $description = $_POST['description'];
            $result = Book::crete($title,$author,$published_date,$publisher,$description);
            $data = Book::getAll();
            require 'view/book/view_book.php';
        }
        break;

    default:
        echo 'action khong hop le!!';
}
?>