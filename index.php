<?php

$ACTION = $_POST['ACTION'];

if ($ACTION == "AUTHENTICATION") {
    require_once("Auth.php");

    $auth = new Authentication();
    $ACTION2 = $_POST['ACTION2'];

    if ($ACTION2 == "REGISTER") {
        $username = $_POST['USERNAME'];
        $manager = $_POST['MANAGER'];
        $password = $_POST['PASSWORD'];
    
        echo $auth->register($username, $manager, $password);
    } elseif ($ACTION2 == "LOGIN") {
        $username = $_POST['USERNAME'];
        $manager = $_POST['MANAGER'];
        $password = $_POST['PASSWORD'];
    
        echo $auth->login($username, $manager, $password);
    } elseif ($ACTION2 == "LOGIN_MANAGER") {
        $username = $_POST['USERNAME'];
        $password = $_POST['PASSWORD'];
    
        echo $auth->loginManager($username, $password);
    } elseif ($ACTION2 == "ADD_MANAGER") {
        $username = $_POST['USERNAME'];
        $password = $_POST['PASSWORD'];
    
        echo $auth->addManager($username, $password);
    }
} elseif ($ACTION == "SLP_DAY") {
    require_once("SLP.php");

    $slp = new SLP();
    $ACTION2 = $_POST['ACTION2'];

    if ($ACTION2 == "SEND_SLP"){
        $username = $_POST['USERNAME'];
        $slps = $_POST['SLP'];

        echo $slp->sendSLP($username, $slps);
    }

}


?>