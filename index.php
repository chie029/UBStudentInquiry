<?php
require_once("Auth.php");

$auth = new Authentication();



$ACTION = $_POST['ACTION'];

if ($ACTION == "REGISTER") {
    $username = $_POST['USERNAME'];
    $usertype = $_POST['USERTYPE'];
    $password = $_POST['PASSWORD'];

    echo $auth->register($username, $usertype, $password);
} elseif ($ACTION == "LOGIN") {
    $username = $_POST['USERNAME'];
    $usertype = $_POST['USERTYPE'];
    $password = $_POST['PASSWORD'];

    echo $auth->login($username, $usertype, $password);
}

?>