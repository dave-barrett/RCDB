<?php
$server = "localhost";
$username = "root";
$password = "winteriscoming345&%!_getouttheway";
$dbname = "dbMASTERusers";
$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conn fail: " . $conn->connect_error);
	echo $conn->connect_error;
}
?>