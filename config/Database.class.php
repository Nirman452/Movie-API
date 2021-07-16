<?php
class Database{

    private $host = 'localhost';
    private $db_name = 'movies';
    private $username = 'root';
    private $pass ='';
    private $conn;

    public function connect(){
        $this-> conn = null;

        try{
            $this-> conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this-> db_name, 
            $this-> username, $this-> pass);
            $this-> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $err){
            echo 'Error when connecting: '.$err->getMessage();
        }

        return $this->conn;
    }
}
?>