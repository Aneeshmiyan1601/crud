<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '1234';
$db_database = 'employee_details';


$conn = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>