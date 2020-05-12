<?php

include_once '../config/Database.php';
include_once '../classes/Manufacturer.php';

$database = new Database();
$db = $database->getConnection();

$manufacturer = new Manufacturer($db);

$stmt = $manufacturer->findAll();

$row = $stmt->fetchAll();

print_r(json_encode($row));

?>
