<?php

class Admin
{

    // konekcija na bazu i naziv tabele
    private $conn;
    private $table_name = "admin";

    // svojstva objekta
    private $id;
    private $name;
    private $password;

    // konstruktor sa konekcijom na bazu $db
    public function __construct($db) {
        $this->conn = $db;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }


    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        $this->password;
    }


    // logovanje usera
    function loginAdmin() {
        // selektuje sve iz baze
        $query = "SELECT `id`, `name`, `password` FROM " . $this->table_name . " WHERE name='".$this->name."' AND password='".$this->password."'";
        //priprema izjavu upita
        $stmt = $this->conn->prepare($query);
        // izvrsava upit
        $stmt->execute();
        return $stmt;
    }


}
