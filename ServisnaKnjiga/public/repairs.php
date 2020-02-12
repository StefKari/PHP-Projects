<?php

include_once "../config/Database.php";
include_once "../classes/Repair.php";

$database = new Database();
$db = $database->getConnection();

$repair = new Repair($db);

$stmt = $repair->findRepairByServiceBook($_POST['service_book_id']);

$row = $stmt->fetchAll();

print_r(json_encode($row));
