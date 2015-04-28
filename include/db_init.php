<?php
ini_set('display_errors', 'On');

$servername = "localhost";
$username = "db_user";
$password = "tW8cGnDFv3TNWCKs";
$database = "db_se2";

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

include_once "db_tables.php"

?>