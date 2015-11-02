<?php
ini_set('display_errors', 'Off');

$servername = "localhost";
$username = "db_user";
$password = "";
$database = "db_se";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ". $database;
if ($conn->query($sql) != TRUE) {
	//TODO: log error
}
$conn->select_db($database);


?>
