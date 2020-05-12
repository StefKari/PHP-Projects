<?php

include_once '../config/Database.php';
include_once '../classes/Model.php';

$database = new Database();
$db = $database->getConnection();

$car = new Model($db);

$stmt = $db->prepare($car->findManufactorByModel($_POST['model_id']));

//$stmt = $car->findCarByOwnerId($_POST['id']);

$stmt->execute();

$row = $stmt->fetchAll();

print_r(json_encode($row));


?>
