<?php

include_once '../config/database.php';

//$session = $_POST['id'];
session_start();
//if(isset($_SESSION['id']) && $_SESSION['id'] == $session)
if(isset($_SESSION['id'])) {

    $arr = array(
        'status' => true,
        'name' => $_SESSION['username'],
        'id' => $_SESSION['id']
    );
}
else {
    $arr = array(
        'status' => false
    );
}

print_r(json_encode($arr));

?>
