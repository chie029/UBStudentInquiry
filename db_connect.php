<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "axie";

$servername = "localhost";
$username = "chaoli3_axie";
$password = "Chie062998";
$database = "chaoli3_axie";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>