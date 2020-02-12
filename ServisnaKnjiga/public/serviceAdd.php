<?php

include_once '../config/Database.php';
include_once '../classes/Service.php';

$database = new Database();
$db = $database->getConnection();

$service = new Service($db);

$service->setName($_POST['name'])->setAddress($_POST['address']);

if ($service->save()){
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno dodat!",
        "id" => $service->getId(),
        "service" => $service->getName(),
        "address" => $service->getAddress(),
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Servis vec postoji!"
    );
}
print_r(json_encode($user_arr));
