<?php

include_once '../config/Database.php';
include_once '../classes/Car.php';

$database = new Database();
$db = $database->getConnection();

$car = new Car($db);
$car->setModel($_POST['model_id'])->setManufacturer($_POST['manufactor_id'])->setBrojSasije($_POST['broj_sasije'])
    ->setRegistarskaOznaka($_POST['registarska_oznaka'])->setSnagaMotora($_POST['snaga_motora'])
    ->setKubikaza($_POST['kubikaza'])->setGodinaProizvodnje($_POST['godina_proizvodnje'])->setVlasnik($_POST['users_id']);



if($car->save()) {
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno dodat!",
        "id" => $car->getVlasnik(),
        "model" => $car->getModel(),
        "manufacturer" => $car->getManufacturer()
    );
}
else {
    $user_arr=array(
        "status" => false,
        "message" => "Automobil vec postoji!"
    );
}
print_r(json_encode($user_arr));

?>
