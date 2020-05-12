<?php

include_once '../config/Database.php';
include_once '../classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->findUserById($_POST['id']);

$row = $stmt->fetchAll();

print_r(json_encode($row));


?>
