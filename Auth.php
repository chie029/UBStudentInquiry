<?php

class Authentication {

    function register($username, $manager, $password){

        $found = 0;
        $jsonUsers = array();
        $getUsers = fopen("Users/ISKO/".$manager."/Users.txt", "w") or die("Unable to open file!");
        if (filesize("Users/ISKO/".$manager."/Users.txt") > 0) {
            $string = fread($getUsers, filesize("Users/ISKO/".$manager."/Users.txt"));
            $jsonUsers = json_decode($string);
    
    
            if ($jsonUsers) {
                foreach ($jsonUsers as $user) {
                    if ($user == $username) {
                        $found = 1;
                    }
                }
            }
        }
        fclose($getUsers);

        if ($found == 1) {

            $json = [
                'status' => '201',
                'response' => 'User already exist!'
            ];

        } else {

            //Create File
            $createUser = fopen("Users/ISKO/".$manager. "/" . $username . ".txt", "w") or die("Unable to open file!");
            $jsonCreate = [
                'username' => $username,
                'manager' => $manager,
                'password' => $password 
            ];
            $txt = json_encode($jsonCreate);
            fwrite($createUser, $txt);
            fclose($createUser);

            $addUser = fopen("Users/ISKO/".$manager. "/Users.txt", "w") or die("Unable to open file!");
            array_push($jsonUsers, $username);
            $txt = json_encode($jsonUsers);
            fwrite($addUser, $txt);
            fclose($addUser);

            if (!file_exists('SLP_DAY/'.$manager.'/' . $username)) {
                mkdir('SLP_DAY/'.$manager.'/' . $username, 0777, true);
            }

            $json = [
                'status' => '200',
                'response' => 'User Created Successful!'
            ];
        }

        return json_encode($json);
    }

    function login($username, $manager, $password) {
        
        $found = 0;
        $return = 0;
        $jsonUsers = array();
        $getUsers = fopen("Users/ISKO/".$manager."/Users.txt", "r") or die("Unable to open file!");
        if (filesize("Users/ISKO/".$manager."/Users.txt") > 0) {

            $string = fread($getUsers, filesize("Users/ISKO/".$manager."/Users.txt"));
            $jsonUsers = json_decode($string);
    
            if ($jsonUsers) {
                foreach ($jsonUsers as $user) {
                    if ($user == $username) {
                        $found = 1;
                    }
                }
            }

        } else {

            $return = 1;
            $json = [
                'status' => '202',
                'response' => 'User not Found!'
            ];

        }
        fclose($getUsers);

        if ($return == 0) {
            if ($found == 1) {

                $getUser = fopen("Users/ISKO/".$manager."/".$username.".txt", "r") or die("Unable to open file!");
                $string = fread($getUser, filesize("Users/ISKO/".$manager."/".$username.".txt"));
                $jsonUser = json_decode($string, true);
                fclose($getUser);
        
                if ($jsonUser["password"] == $password) {

                    $json = [
                        'status' => '200',
                        'response' => 'Authentication Successful!'
                    ];

                } else {

                    $return = 1;
                    $json = [
                        'status' => '202',
                        'response' => 'Incorrect Password!'
                    ];

                }

            } else {

                $return = 1;
                $json = [
                    'status' => '202',
                    'response' => 'User not Found!'
                ];

            }
        }

        return json_encode($json);
    }

    function loginManager($username, $password) {
        
        $found = 0;
        $return = 0;
        $jsonUsers = array();
        $getUsers = fopen("Users/MANAGER/Users.txt", "r") or die("Unable to open file!");
        if (filesize("Users/MANAGER/Users.txt") > 0) {

            $string = fread($getUsers, filesize("Users/MANAGER/Users.txt"));
            $jsonUsers = json_decode($string);
    
            if ($jsonUsers) {
                foreach ($jsonUsers as $user) {
                    if ($user == $username) {
                        $found = 1;
                    }
                }
            }

        } else {

            $return = 1;
            $json = [
                'status' => '202',
                'response' => 'User not Found!'
            ];

        }
        fclose($getUsers);

        if ($return == 0) {
            if ($found == 1) {

                $getUser = fopen("Users/MANAGER/".$username.".txt", "r") or die("Unable to open file!");
                $string = fread($getUser, filesize("Users/MANAGER/".$username.".txt"));
                $jsonUser = json_decode($string, true);
                fclose($getUser);
        
                if ($jsonUser["password"] == $password) {

                    $json = [
                        'status' => '200',
                        'response' => 'Authentication Successful!'
                    ];

                } else {

                    $return = 1;
                    $json = [
                        'status' => '202',
                        'response' => 'Incorrect Password!'
                    ];

                }

            } else {

                $return = 1;
                $json = [
                    'status' => '202',
                    'response' => 'User not Found!'
                ];

            }
        }

        return json_encode($json);
    }

    function addManager($username, $password) {

        $found = 0;
        $jsonUsers = array();
        $getUsers = fopen("Users/MANAGER/Users.txt", "w") or die("Unable to open file!");
        if (filesize("Users/MANAGER/Users.txt") > 0) {
            $string = fread($getUsers, filesize("Users/MANAGER/Users.txt"));
            $jsonUsers = json_decode($string);
    
    
            if ($jsonUsers) {
                foreach ($jsonUsers as $user) {
                    if ($user == $username) {
                        $found = 1;
                    }
                }
            }
        }
        fclose($getUsers);

        if ($found == 1) {

            $json = [
                'status' => '201',
                'response' => 'User already exist!'
            ];

        } else {

            //Create File
            $createUser = fopen("Users/MANAGER/" . $username . ".txt", "w") or die("Unable to open file!");
            $jsonCreate = [
                'username' => $username,
                'password' => $password 
            ];
            $txt = json_encode($jsonCreate);
            fwrite($createUser, $txt);
            fclose($createUser);

            $addUser = fopen("Users/MANAGER/Users.txt", "w") or die("Unable to open file!");
            array_push($jsonUsers, $username);
            $txt = json_encode($jsonUsers);
            fwrite($addUser, $txt);
            fclose($addUser);

            if (!file_exists('Users/ISKO/' . $username)) {
                mkdir('Users/ISKO/' . $username, 0777, true);
            }

            if (!file_exists('SLP_DAY/' . $username)) {
                mkdir('SLP_DAY/' . $username, 0777, true);
            }

            $json = [
                'status' => '200',
                'response' => 'User Created Successful!'
            ];
        }

        return json_encode($json);

    }

}

// $myfile = fopen("Users/testfile.txt", "w") or die("Unable to open file!");
// $json = [
//     'status' => 'sample',
//     'status1' => 'sample1',
//     'status2' => 'sample1',
//     'response' => 'sample1'
// ];
// $txt = json_encode($json);
// fwrite($myfile, $txt);
// fclose($myfile);

// $myfile = fopen("Users/testfile.txt", "r") or die("Unable to open file!");
// $string = fread($myfile, filesize("Users/testfile.txt"));
// fclose($myfile);

?>

