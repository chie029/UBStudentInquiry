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
        $password = $_POST['PASSWORD'];
    
        echo $auth->login($username, $password);
    }
} elseif ($ACTION == "SLP_DAY") {
    require_once("SLP.php");

    $auth = new SLP();
    $ACTION2 = $_POST['ACTION2'];

    if ($ACTION2 == "SEND_SLP"){
        $username = $_POST['USERNAME'];
        $ACTION = $_POST['ACTION'];

    }

}


?>