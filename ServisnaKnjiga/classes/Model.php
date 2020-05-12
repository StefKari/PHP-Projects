<?php

class Model
{

    private $conn;
    private $table_name = "models";

    private $id;
    private $name;
    private $manufacturer;


    public function __construct($db) {
        $this->conn = $db;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getManufacturer() {
        return $this->manufacturer;
    }


    function save() {

    if($this->isAlreadyExist()) {
        return false;
    }
    // upit za upisivanje u bazu
    $query = "INSERT INTO " . $this->table_name . " SET manufacturers_id=:manufacturers_id, name=:name";


    // prirpema izjavu upita
    $stmt = $this->conn->prepare($query);


    // cisti
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->manufacturer=htmlspecialchars(strip_tags($this->manufacturer));


    // vezuje vrednosti
    $stmt->bindParam(":name", $this->name);
    $stmt->bindValue(":manufacturers_id", $this->manufacturer, PDO::PARAM_INT);



    // izvrsava upit
    if($stmt->execute()) {
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

public function findModelByManufactor($manufacturerId) {

    return "select models.* from " . $this->table_name . " left join manufacturers on models.manufacturers_id = manufacturers.id
            where models.manufacturers_id = $manufacturerId";


}

public function findManufactorByModel($modelId) {
    return "select models.*, manufacturers.id, manufacturers.name as manufactor from " . $this->table_name . " left join manufacturers on models.manufacturers_id = manufacturers.id
            where models.id = $modelId";
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
