<?php

class ServiceBook
{

    private $conn;
    private $table_name = "service_book";

    private $id;
    private $created;
    private $carId;


    public function __construct($db) {
        $this->conn = $db;
    }

    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    public function setCarId($carId) {
        $this->carId = $carId;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getCarId() {
        return $this->carId;
    }

    function save() {

        if($this->isAlreadyExist()) {
            return false;
        }


        $query = "INSERT INTO " . $this->table_name . " SET created=:created, cars_id=:cars_id";


        $stmt = $this->conn->prepare($query);


        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->carId=htmlspecialchars(strip_tags($this->carId));

        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":cars_id", $this->carId);



        if($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;

    }


    public function findServiceBookByCarId() {

        $query = "select * from " . $this->table_name . " left join cars on service_book.cars_id = cars.id
            where cars_id = " . $this->carId;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    function isAlreadyExist() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE cars_id= " . $this->carId;
        // priprema izjavu upita
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
