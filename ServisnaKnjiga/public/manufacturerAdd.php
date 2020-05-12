<?php

include_once '../config/Database.php';
include_once '../classes/Manufacturer.php';

$database = new Database();
$db = $database->getConnection();

$manufacturer = new Manufacturer($db);

$manufacturer->setName($_POST['name']);

if($manufacturer->save()) {
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno sacuvan!",
        "id" => $manufacturer->getId(),
        "manufacturer" => $manufacturer->getName()
    );
}
else {
    $user_arr=array(
        "status" => false,
        "message" => "Proizvodjac vec postoji!"
    );
}
print_r(json_encode($user_arr));

?>
