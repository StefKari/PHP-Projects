<?php

include_once '../config/Database.php';
include_once '../classes/Model.php';

$database = new Database();
$db = $database->getConnection();

$model = new Model($db);

$stmt = $model->findAll();

$row = $stmt->fetchAll();

print_r(json_encode($row));

?>
