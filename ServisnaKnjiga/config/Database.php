<?php

class Database
{
    // parametri
    private $host="localhost";
    private $username="root";
    private $password="";
    private $dbName="servisna_knjiga";

    public $conn;
    
    // konekcija
    public function getConnection(){
        $this->conn = null;

        try {
          $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->username, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
