<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);

$arr=array(
    'status' => true
);

print_r(json_encode($arr));

?>
