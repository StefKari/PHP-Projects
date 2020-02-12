<?php

class Car
{

    private $conn;
    private $table_name = "cars";

    private $id;
    private $model;
    private $manufacturer;
    private $brojSasije;
    private $registarskaOznaka;
    private $snagaMotora;
    private $kubikaza;
    private $godinaProizvodnje;
    private $vlasnik;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    public function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function setBrojSasije($brojSasije) {
        $this->brojSasije = $brojSasije;
        return $this;
    }

    public function setRegistarskaOznaka($registarskaOznaka) {
        $this->registarskaOznaka = $registarskaOznaka;
        return $this;
    }

    public function setSnagaMotora($snagaMotora) {
        $this->snagaMotora = $snagaMotora;
        return $this;
    }

    public function setKubikaza($kubikaza) {
        $this->kubikaza = $kubikaza;
        return $this;
    }

    public function setGodinaProizvodnje($godinaProizvodnje) {
        $this->godinaProizvodnje = $godinaProizvodnje;
        return $this;
    }

    public function setVlasnik($vlasnik) {
        $this->vlasnik = $vlasnik;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getModel() {
        return $this->model;
    }

    public function getManufacturer() {
        return $this->manufacturer;
    }

    public function getBrojSasije() {
        return $this->brojSasije;
    }

    public function getRegistarskaOznaka() {
        return $this->registarskaOznaka;
    }

    public function getSnagaMotora() {
        return $this->snagaMotora;
    }

    public function getKubikaza() {
        return $this->kubikaza;
    }

    public function getGodinaProizvodnje() {
        return $this->godinaProizvodnje;
    }

    public function getVlasnik() {
        return $this->vlasnik;
    }

    public function save() {
        if($this->isAlreadyExist()){
            return false;
        }

        // upit za ubacivanje zapisa
        $query = "INSERT INTO " . $this->table_name . " SET manufacturers_id=:manufacturers_id, models_id=:models_id,
        brojSasije=:brojSasije, registarskaOznaka=:registarskaOznaka, snagaMotora=:snagaMotora,
        kubikaza=:kubikaza, godinaProizvodnje=:godinaProizvodnje, users_id=:users_id";


        // priprema izjavu upita
        $stmt = $this->conn->prepare($query);


        // cisti
        $this->model=htmlspecialchars(strip_tags($this->model));
        $this->manufacturer=htmlspecialchars(strip_tags($this->manufacturer));
        $this->brojSasije=htmlspecialchars(strip_tags($this->brojSasije));
        $this->registarskaOznaka=htmlspecialchars(strip_tags($this->registarskaOznaka));
        $this->snagaMotora=htmlspecialchars(strip_tags($this->snagaMotora));
        $this->kubikaza=htmlspecialchars(strip_tags($this->kubikaza));
        $this->godinaProizvodnje=htmlspecialchars(strip_tags($this->godinaProizvodnje));
        $this->vlasnik=htmlspecialchars(strip_tags($this->vlasnik));


        // vezuje vrednosti
        $stmt->bindParam(":models_id", $this->model);
        $stmt->bindValue(":manufacturers_id", $this->manufacturer, PDO::PARAM_INT);
        $stmt->bindParam(":brojSasije", $this->brojSasije);
        $stmt->bindParam(":registarskaOznaka", $this->registarskaOznaka);
        $stmt->bindParam(":snagaMotora", $this->snagaMotora);
        $stmt->bindParam(":kubikaza", $this->kubikaza);
        $stmt->bindParam(":godinaProizvodnje", $this->godinaProizvodnje);
        $stmt->bindParam(":users_id", $this->vlasnik);




        // izvrsava upit
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    public function findAll() {

        $query = "select cars.id, models.name from " . $this->table_name . " left join models on cars.models_id = models.id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    public function findCarByOwnerId($id) {
        return "select cars.id, concat(models.name, ' ', manufacturers.name) as auto from " . $this->table_name . " left join
         models on cars.models_id = models.id left join manufacturers on cars.manufacturers_id = manufacturers.id
         where cars.users_id = $id";

    }

    public function findCarById($id) {
        $query = "select concat(models.name, ' ', manufacturers.name) as auto, cars.id, cars.kubikaza, cars.godinaProizvodnje,
         cars.snagaMotora, service_book.id as service_book_id from " . $this->table_name . " left join
         models on cars.models_id = models.id left join manufacturers on cars.manufacturers_id = manufacturers.id
         left join service_book on cars.id = service_book.cars_id
         where cars.id = $id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    /*public function findCarByRegistration($registarskaOznaka) {
        return "select concat(models.name, ' ', manufacturers.name) as auto, cars.id, cars.private from " . $this->table_name . "
        left join models on cars.models_id = models.id left join manufacturers on cars.manufacturers_id = manufacturers.id
        left join service_book on cars.id = service_book.cars_id where cars.registarskaOznaka like '" . $registarskaOznaka . "'";

    }*/

    /*public function showCarByRegistration($registarskaOznaka) {
        return "select concat(models.name, ' ', manufacturers.name) as auto, cars.id, cars.kubikaza, cars.registarskaOznaka, cars.godinaProizvodnje,
         cars.snagaMotora, service_book.id as service_book_id from " . $this->table_name . " left join
         models on cars.models_id = models.id left join manufacturers on cars.manufacturers_id = manufacturers.id
         left join service_book on cars.id = service_book.cars_id
         where cars.registarskaOznaka = " . $registarskaOznaka;

    }*/


    public function isAlreadyExist() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE registarskaOznaka='" . $this->registarskaOznaka . "' OR brojSasije='" .
            $this->brojSasije . "'";
        // priprema izjavu upita
        $stmt = $this->conn->prepare($query);
        // izvrsava upit
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }
}
