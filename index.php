<?php 
//main program

//display header
include "templates/header.php";

//start main body
echo "<div class='body'>";

//left menu barr
include "templates/leftmenu.php";

//switch for aciont
//echo is_login();


$action = "" ;
if(!empty($_GET['action'])) {
	$action = $_GET['action'];
	$action = basename($action);
}

if (is_login() ){
	if(!empty( $action )) {
	    if($action == "login"){
	    	$action = "accounts";
	    }else if ($action == "logout"){
	    	end_session();
	    	start_session();
	    	$action = "login";
	    }else if (!file_exists("templates/$action.php"))
	        $action = "accounts";
	    include("templates/$action.php");
	}else{
		include("templates/accounts.php");
	}
} else {
	if(!empty($action)) {
	    if( $action != "register")
	    	$action = "login";
	    include("templates/$action.php");
	}else{
    	include("templates/login.php");
	}
}
echo "</div>";
?>
