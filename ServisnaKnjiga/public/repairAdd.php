<?php

include_once "../config/Database.php";
include_once "../classes/Repair.php";

$database = new Database();
$db = $database->getConnection();

$repair = new Repair($db);

$repair->setRepair($_POST['repair'])->setDate($_POST['date'])->setDistance($_POST['distance'])->setPrice($_POST['price'])
->setCarServiceId($_POST['car_service'])->setServiceBookId($_POST['service_book']);

// kreira usera
if($repair->save()) {
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno kreiran!",
        "id" => $repair->getId(),
    );
}
else {
    $user_arr=array(
        "status" => false,
        "message" => "Greska"
    );
}
print_r(json_encode($user_arr));

?>
