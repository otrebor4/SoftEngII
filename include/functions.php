<?php 


function start_session()
{
	session_start();
	//start creating session variables if no exist
	if (!isset($_SESSION['user_id']) ) {
		$_SESSION['user_id'] = '';
	}
}

function register_account($mysql,  $name, $email, $phone, $address, $password)
{
    $p = md5($password);
    if( $stmt = $mysql->prepare("INSERT INTO USERS (user_id, user_fullName, user_email, user_phone, user_address, user_password) 
        VALUES (NULL, ?, ?, ?, ?, ?)")){
        $stmt->bind_param('sssss', $name, $email, $phone,$address,$p);
        $stmt->execute();
        $stmt->store_result();

        return login($email, $password, $mysql);
    }

    return false;
}

function login($email, $password, $mysql)
{
	if(empty($email) || empty($password))
		return false;

	$p =  md5( $password);
	// Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysql->prepare("SELECT user_id, user_fullName, user_password FROM USERS WHERE user_email = ? LIMIT 1") ) {
        $stmt->bind_param('s', $email);  
        $stmt->execute();  
        $stmt->store_result();
 
        $stmt->bind_result($user_id, $fullname, $db_password);
        $stmt->fetch();
        if($db_password == $p){
        	$_SESSION['user_id'] = $user_id;
        	$_SESSION['full_name'] = $fullname;
        	$_SESSION['email'] = $email;
        	return true;
        }else{
        	return false;
        }
    }
    return false;
}

function is_login()
{
	return isset($_SESSION['user_id']) && !empty( $_SESSION['user_id']);
}

function end_session()
{
    $_SESSION = [];
    session_unset();
    session_destroy();
}


?>