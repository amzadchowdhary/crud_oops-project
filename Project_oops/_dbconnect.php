<?php
class Database{

   private $servername = "localhost";
   private $username = "root";
   private $password = "password";
   private  $database = "ads";
   public $conn;

   public function getConnection(){

    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
    else {
      return $this->conn;
    }}
     
  }
?>