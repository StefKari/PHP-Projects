<?php

include_once '../config/Database.php';
include_once '../classes/ServiceBook.php';

$database = new Database();
$db = $database->getConnection();

$serviceBook = new ServiceBook($db);

// podesavanje vrednosti svojstva korisnika
$serviceBook->setCarId($_POST['car_id'])->setCreated(date('Y-m-d H:i:s'));

// kreiranje usera
if($serviceBook->save()) {
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno kreiran!",
        "id" => $serviceBook->getId(),
    );
}else{
    $user_arr=array(
        "status" => false,
        "message" => "Autobobil vec ima servisnu knjigu!"
    );
}
print_r(json_encode($user_arr));

?>
