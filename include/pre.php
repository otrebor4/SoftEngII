<?php 
function checkdata($data, $key)
{
	return isset($data[$key]) && !empty($data[$key]); 
}


$post_error_msg = '';
if(isset($_POST) && !empty($_POST['submit'])){
	

	//login POST listener
	if($_POST['submit'] == "Login"){
		//check if one of the entry is empty
		if (!checkdata($_POST, "username")){
			$post_error_msg = "Please enter a valid email address.";
		}else if(!checkdata($_POST, "password") ) {
			$post_error_msg = "Please enter a valid password.";
		}else{
			$password = $_POST['password'];
			$username = $_POST['username'];

			if( login($username, $password, $conn) ){
				header ("location: /templates/dummy.php");
				exit();
			}else{
				$post_error_msg = "Mismatch email and password";
			}
		}
	}else if($_POST['submit'] == "Register"){
		if(checkdata($_POST, "name") 
			&&checkdata($_POST, "email")
			&&checkdata($_POST, "phone")
			&&checkdata($_POST, "address")
			&&checkdata($_POST, "password")
			&&checkdata($_POST, "confirm_password") ) {

			$name 				= $_POST['name'];
			$email 				= $_POST['email'];
			$phone 				= $_POST['phone'];
			$address 			= $_POST['address'];
			$password 			= $_POST['password'];
			$confirm_password 	= $_POST['confirm_password'];

			if($password != $confirm_password){
				$post_error_msg = "password mismatch";

			}else if ( register_account($conn, $name, $email, $phone, $address, $password) ){

				header ("location: /templates/dummy.php");
				exit();
			}else{
				$post_error_msg="Unable to create account";
			}
		}else{
			$post_error_msg="Uncomplete form";
		}
	}else if($_POST['submit'] == "add_account"){
		if(!checkdata($_POST, "account_num")){
			$post_error_msg="Invalid account number";
		}else if(!checkdata($_POST, "account_name")){
			$post_error_msg="Account name must have a name";
		}else{
			$acc_name = $_POST['account_name'];
			$acc_num = $_POST['account_num'];
			if(create_account($conn, $acc_name, $acc_num)){
				header('location: /templates/dummy.php');
				exit();
			}else{
				$post_error_msg="Unable to add account";
			}
		}
	}else if($_POST['submit'] == 'send_coins'){
		#var_dump($_POST);

		if(!checkdata($_POST, 'send_to')){
			$post_error_msg = "empty destination account";
		}else if(!checkdata($_POST, 'send_amount')){
			$post_error_msg = "invalid amount";
		}else if(!checkdata($_POST, 'pay_from')){
			$post_error_msg = "empty pay option";
		}else{
			$to = $_POST['send_to'];
			$ammount = $_POST['send_amount'];
			$pay_from = $_POST['pay_from'];

			$post_error_msg = send_transaction($conn, $to, $ammount, $pay_from);
			if( $post_error_msg == 'true'){
				header('location: /templates/dummy.php');
				exit();
			}
		}
	}

}

?>