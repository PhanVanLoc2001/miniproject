<?php
class Connect
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'miniproject';

    public function cnt()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password,$this->database);
        mysqli_set_charset($conn,'utf8');
        return $conn;
    }

    public function select($sql)
    {
        $conn = $this->cnt();
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);

        return $result;
    }

    public function execute( $sql):void
    {
        $conn = $this->cnt();
        mysqli_query($conn,$sql);
        mysqli_close($conn);
    }
}
