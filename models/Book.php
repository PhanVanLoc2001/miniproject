<?php
require_once 'models/Connect.php';
class Book
{   
    private $id;
    private $title;
    private $author;
    private $published_date;
    private $publisher;
    private $description;

    public function __construct($row){
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->author = $row['author'];
        $this->published_date = $row['published_date'];
        $this->publisher = $row['publisher'];
        $this->description = $row['description'];
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getPublishedDate()
    {
        return $this->published_date;
    }

    public function setPublishedDate($published_date): void
    {
        $this->published_date = $published_date;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher($publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public static function getAll()
    {
        $sql = "SELECT * FROM book";
        $result = (new Connect())->select($sql);

        $arr = [];
        foreach($result as $row){
            $object = new Book($row);
            $arr[] = $object;
        }
        return $arr;
    }
    public static function add($title,$author,$published_date,$publisher,$description){
        $sql = "INSERT INTO book(title, author, published_date, publisher, description) VALUES ('$title','$author','$published_date','$publisher','$description')";
        $result = (new Connect())->execute($sql);
    }
    public static function update($id,$title,$author,$published_date,$publisher,$description){
        $sql = "UPDATE book set title='$title', author='$author', published_date='$published_date', publisher='$publisher', description='$description' WHERE id ='$id'";
        $result = (new Connect())->execute($sql);
    }
    public static function delete($id){
        $sql = "DELETE FROM book WHERE id ='$id'";
        $result = (new Connect())->execute($sql);
    }
}