<?php

$ACTION = $_POST['ACTION'];

if ($ACTION == "AUTHENTICATION") {
    require_once("Auth.php");

    $auth = new Authentication();
    $ACTION2 = $_POST['ACTION2'];

    if ($ACTION2 == "REGISTER") {
        $username = $_POST['USERNAME'];
        $usertype = $_POST['USERTYPE'];
        $password = $_POST['PASSWORD'];
    
        echo $auth->register($username, $usertype, $password);
    } elseif ($ACTION2 == "LOGIN") {
        $username = $_POST['USERNAME'];
        $usertype = $_POST['USERTYPE'];
        $password = $_POST['PASSWORD'];
    
        echo $auth->login($username, $usertype, $password);
    }
}


?>