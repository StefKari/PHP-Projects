<?php

include_once '../config/Database.php';
include_once '../classes/Car.php';

$database = new Database();
$db = $database->getConnection();

$car = new Car($db);

$stmt = $car->findAll();

$row = $stmt->fetchAll();

print_r(json_encode($row));
