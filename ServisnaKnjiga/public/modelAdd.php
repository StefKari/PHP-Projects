<?php

include_once '../config/Database.php';
include_once '../classes/Model.php';

$database = new Database();
$db = $database->getConnection();

$model = new Model($db);

$model->setName($_POST['name'])->setManufacturer($_POST['manufactor_id']);

if($model->save()){
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno dodat!",
        "id" => $model->getId(),
        "model" => $model->getName(),
        "manufacturer" => $model->getManufacturer()
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Model vec postoji!"
    );
}
print_r(json_encode($user_arr));
?>
