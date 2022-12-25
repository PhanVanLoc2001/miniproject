<?php
class DB
{
    private $conn = null;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $DBname='miniproject';
    private $result=null;

    function __construct(){}
    private function connect()
    {
        $this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->DBname);
        if(!$this->conn){
            die('Ket noi that bai toi DB');
        }
        mysqli_set_charset($this->conn,'utf8');
    }
    private function close(){
        mysqli_close($this->conn);
    }
    public function select($sql){
        $this->connect();
        $result=mysqli_query($this->conn,$sql);
        $this->close();
        return $result;
    }
    public function command($sql){
        $this->connect();
        $result=mysqli_query($this->conn,$sql);
        $this->close();
        if($result)
            return true;
        return false;
    }
}
?>