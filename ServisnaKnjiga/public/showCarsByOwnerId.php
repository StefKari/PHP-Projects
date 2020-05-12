<?php

include_once '../config/Database.php';
include_once '../classes/Car.php';

$database = new Database();
$db = $database->getConnection();

$car = new Car($db);

$stmt = $db->prepare($car->findCarByOwnerId($_POST['id']));

//$stmt = $car->findCarByOwnerId($_POST['id']);

$stmt->execute();

$row = $stmt->fetchAll();

print_r(json_encode($row));
