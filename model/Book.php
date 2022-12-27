<?php
    require 'DBconfig.php';
class Book
{
    public $id;
    public $title;
    public $author;
    public $published_date;
    public $publisher;
    public $description;


    function __construct($id,$title,$author,$published_date,$publisher,$description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->published_date = $published_date;
        $this->publisher = $publisher;
        $this->description = $description;
    }

    static function getAll()
    {
        $db = new DB();
        $sql = 'select * from book';
        $data = $db->select($sql);
        return $data;
    }

    static function crete($title,$author,$published_date,$publisher,$description){
        $db = new DB();
        $sql = "INSERT INTO book(title, author, published_date, publisher, description) VALUES ('$title','$author','$published_date','$publisher','$description')";
        $result = $db->command($sql);
        return $result;
    }
    static function edit($id,$title,$author,$published_date,$publisher,$description){
        $db = new DB();
        $sql = "UPDATE book set title='$title', author='$author', published_date='$published_date', publisher='$publisher', description='$description' WHERE id ='$id'";
        $result = $db->command($sql);
        return $result;
    }
    static function delete($id){
        $db = new DB();
        $sql = "DELETE FROM book WHERE id ='$id'";
        $result = $db->command($sql);
        return $result;
    }
}