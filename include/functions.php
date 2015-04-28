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
        //$stmt->p();
 
        $stmt->bind_result($user_id, $fullname, $db_password);
        $stmt->fetch();
        //$stmt->close();
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
    $_SESSION = array();
    session_unset();
    session_destroy();
}

function create_account($mysql, $account_name, $account_number)
{
    $user_id = $_SESSION['user_id'];
    if(empty($account_name) || empty($account_number) || empty($user_id))
        return false;
    
    if( $stmt = $mysql->prepare("INSERT INTO ACCOUNTS (account_number, account_name, account_user_id, account_balance) 
        VALUES (?, ?, ?, ?)")){
        $balance = 0;
        $stmt->bind_param('ssid', $account_number, $account_name, $user_id, $balance);

        $stmt->execute();
        $stmt->store_result();

        return true;
    }

    return false;
}

function get_accounts($mysql)
{
    $array = array();
    
    if($stmt = $mysql->prepare("SELECT account_name, account_number, account_user_id, account_balance FROM ACCOUNTS WHERE account_user_id = ?") ){
        $stmt->bind_param('s', $_SESSION['user_id']);
        $stmt->execute();
        $stmt->store_result();
        
        $stmt->bind_result($acc_name, $acc_num, $user_id, $acc_balance);
        $i =0;
        while($stmt->fetch()){
            $array[$i]['acc_name']= $acc_name;
            $array[$i]['acc_num'] = $acc_num;
            $array[$i]['user_id'] = $user_id;
            $array[$i]['acc_balance'] = $acc_balance;
            $i++;
        }
    }

    return $array;
}

function get_transactions($mysql, $account_id)
{
    $array = array();

    return $array;
}





















?>