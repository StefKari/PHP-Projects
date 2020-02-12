<?php

// inkluduje bazu i date klase
include_once '../config/Database.php';
include_once '../classes/Admin.php';

// dbijanje veze sa bazom
$database = new Database();
$db = $database->getConnection();

// instanciranje objekta
$admin = new Admin($db);
// podesavanje id svojsvta usera koji treba da se odradjuje
$admin->setName(isset($_POST['name']) ? $_POST['name'] : die());
$admin->setPassword(isset($_POST['password']) ? $_POST['password'] : die());
// cita detalje o useru koji treba da se uredjuje
$stmt = $admin->loginAdmin();
session_start();
if($stmt->rowCount() > 0){
    //preuzima red iz baze
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $adminId = $row['id'];
    $adminName = $row['name'];
    $_SESSION['id'] = $adminId;
    $_SESSION['name'] = $adminName;
    // kreiranje array odnosno niza
    $user_arr=array(
        "status" => true,
        "message" => "Uspesno ulogovan!",
        "id" => $row['id'],
        "name" => $row['name']
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Pogresan/a Username ili Lozinka!",
    );
}
// pravljenje niza u json format
print_r(json_encode($user_arr));
?>
