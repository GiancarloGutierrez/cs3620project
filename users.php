<?php
header("Access-Control-Allow-Origin: *");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    require_once('./user/user.php');

    $user = new user();
    $user->getUser($_GET["value1"],$_GET["option1"]);

    echo json_encode($user);
?>