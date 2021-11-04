<?php 

class Resource {

    function getAllManager(){

        $jsonUsers = array();
        if ($getUsers = fopen("Users/Manager/Users.txt", "r")) {
            if (filesize("Users/MANAGER/Users.txt") > 0) {
                $string = fread($getUsers, filesize("Users/MANAGER/Users.txt"));
                $jsonUsers = json_decode($string);
                fclose($getUsers);
                array_push($jsonUsers, "MANAGER");
                $json = [
                    'status' => '200',
                    'response' => json_encode($jsonUsers)
                ];
            } else {
                array_push($jsonUsers, "MANAGER");
                $json = [
                    'status' => '200',
                    'response' => json_encode($jsonUsers)
                ];
            }
        }

        return json_encode($json);
    }

}

?>