<?php

class Manufacturer
{

    private $conn;
    private $table_name = "manufacturers";

    private $id;
    private $name;


    public function __construct($db) {
        $this->conn = $db;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function save() {

        if($this->isAlreadyExist()) {
            return false;
        }

        $query = "INSERT INTO " . $this->table_name . " SET name=:name";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));


        $stmt->bindParam(":name", $this->name);

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;

    }

    public function findAll() {

        $query = "select * from " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    function isAlreadyExist() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name='".$this->name."'";
        // prirpema izjavu upita
        $stmt = $this->conn->prepare($query);
        // izvrsava upit
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }


}
