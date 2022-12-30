<?php
require 'models/Book.php';
class BookController
{
    public function view_book():void
    {
        $arr = Book::getAll();
        require 'views/books/view_book.php';
    }
    public function create_book(){
        if(isset($_POST['btnSubmitBook'])) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $published_date = $_POST['published_date'];
            $publisher = $_POST['publisher'];
            $description = $_POST['description'];

           if($this->validate($title,$author,$published_date,$publisher,$description)===true){
                Book::add($title,$author,$published_date,$publisher,$description);
               $arr = Book::getAll();
               require 'views/books/view_book.php';
            }
        }
    }

    public function update_book(){
        if(isset($_POST['btnSubmitBook'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $published_date = $_POST['published_date'];
            $publisher = $_POST['publisher'];
            $description = $_POST['description'];

            if($this->validate($title,$author,$published_date,$publisher,$description)===true){
                Book::update($id,$title,$author,$published_date,$publisher,$description);
                $arr = Book::getAll();
                require 'views/books/view_book.php';
            }
    }
    }
    public function delete_book(){
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            Book::delete($id);
            $arr = Book::getAll();
            require 'views/books/view_book.php';
        }
    }
    private function validate($title,$author,$published_date,$publisher,$description){
          if(empty($title)){
                $err="Tiêu đề không được bỏ trống";
              $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if(empty($author)){
                $err="Tác giả không được bỏ trống";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if(empty($published_date)){
                $err="Năm xuất bản không được bỏ trống";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if(empty($publisher)){
                $err="Nhà xuất bản không được bỏ trống";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if(strlen($title)>100){
                $err="Tiêu đề sách không vượt quá 100 kí tự";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if(strlen($author)>50){
                $err="Tên tác giả không vượt quá 50 kí tự";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if($published_date<1000){
                $err="Năm xuất bản không hợp lệ !";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            if(strlen($author)>100){
                $err="Tên nhà xuất bản không vượt quá 100 kí tự";
                  $arr = Book::getAll();
              require 'views/books/view_book.php';
                return false;
            }
            return true;
    }
    
}