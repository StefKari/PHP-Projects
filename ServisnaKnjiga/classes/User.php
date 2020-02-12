<?php

class User
{

    private $conn;
    private $table_name = "users";

    private $id;
    private $username;
    private $password;
    private $email;
    private $created;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        $this->password;
    }

    public function getEmail() {
        $this->email;
    }

    // resgistrovanje usera
    function signup() {

        if($this->isAlreadyExist()) {
            return false;
        }
        // upit za upisivanje u bazu
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, password=:password, email=:email, created=:created";

        // priprema izjavu upita
        $stmt = $this->conn->prepare($query);

        // cisti
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->created=htmlspecialchars(strip_tags($this->created));

        // vezuje vrednosti
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":created", $this->created);

        // izvrsava upit
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;

    }
    // logovanje usera
    function login() {
        // selektuje sve iz baze
        $query = "SELECT `id`, `username`, `password`, `created` FROM " . $this->table_name . " WHERE username='".$this->username."' AND password='".$this->password."'";
        // priprema izjavu upita
        $stmt = $this->conn->prepare($query);
        // izvrsava upit
        $stmt->execute();
        return $stmt;
    }

    function isAlreadyExist() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username='".$this->username."'";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function findAll() {

        $query = "select id, username, email from " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    public function findUserById($id) {
        $query = "select id, username, email from " . $this->table_name . " where id = $id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }



}
