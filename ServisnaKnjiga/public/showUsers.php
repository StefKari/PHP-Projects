<?php


include_once '../config/Database.php';
include_once '../classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->findAll();

$row = $stmt->fetchAll();

print_r(json_encode($row));
