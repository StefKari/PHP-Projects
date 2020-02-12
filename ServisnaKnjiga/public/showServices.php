<?php

include_once '../config/Database.php';
include_once '../classes/Service.php';

$database = new Database();
$db = $database->getConnection();

$service = new Service($db);

$stmt = $service->findAll();

$row = $stmt->fetchAll();

print_r(json_encode($row));

?>
