<?php

include_once '../config/Database.php';
include_once '../classes/User.php';

// dobijanje konekcije na bazu
$database = new Database();
$db = $database->getConnection();

// instanciranje objekta
$user = new User($db);
// podesavanje svosjtva id usera koji treba da se uredjuje
$user->setUsername(isset($_POST['username']) ? $_POST['username'] : die());
$user->setPassword(base64_encode(isset($_POST['password']) ? $_POST['password'] : die()));
// cita detalje o useru koji treba da se uredjuje
$stmt = $user->login();
session_start();
if($stmt->rowCount() > 0){
    //preuzima red iz baze
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $userId = $row['id'];
    $userName = $row['username'];
    $_SESSION['id'] = $userId;
    $_SESSION['username'] = $userName;

    $user_arr=array(
        "status" => true,
        "message" => "Uspesno ulogovan!",
        "id" => $userId,
        "username" => $userName
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Pogresan/a Username ili Password!",
    );
    unset($_SESSION['id']);
}

print_r(json_encode($user_arr));
?>
