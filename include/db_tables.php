<?php

function CreateTable($conn, $tablename, $tabledata)
{
	$sql = "CREATE TABLE IF NOT EXISTS " . $tablename . "(" . $tabledata . ")";
	if($conn->query($sql) != TRUE){
		//echo "Error creating table: " . $tablename . " " . $conn->error;
	}
}

$table_users = "USERS";
$table_trans = "TRANSACTIONS";
$table_addresses = "ADDRESSES";
$table_balances = "ACCOUNTS";

//Uers table
$table = "
user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_fullName VARCHAR(255),
user_email VARCHAR(255),
user_phone CHAR(12),
user_address VARCHAR(255),
user_password CHAR(128)
";

CreateTable($conn,$table_users, $table);


//Transactoins table
$table="
	transaction_id BIGINT AUTO_INCREMENT PRIMARY KEY,
	transaction_time TIMESTAMP,
	transaction_sender CHAR(128),
	transaction_target CHAR(128),
	transaction_amount DOUBLE
";

CreateTable($conn,$table_trans,$table);


//Addresses table
$table = "
	address_id CHAR(128),
	address_user INT,
	address_balance DOUBLE
";

CreateTable($conn,$table_addresses,$table);


//Account tables
$table = "
	account_number CHAR(128),
	account_name CHAR(128),
	account_user_id INT,
	account_balance DOUBLE
";

CreateTable($conn, $table_balances, $table);


?>