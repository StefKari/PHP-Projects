<?php

include_once '../config/Database.php';
include_once '../classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->setUsername($_POST['username'])->setPassword(base64_encode($_POST['password']))->setEmail($_POST['email'])
    ->setCreated(date('Y-m-d H:i:s'));

if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno ste se registrovali!",
        "id" => $user->getId(),
        "username" => $user->getUsername()
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Username vec postoji!"
    );
}
print_r(json_encode($user_arr));
?>
