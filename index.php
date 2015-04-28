<?php 
//main program
include_once "include/load.php";


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
	    	header("location: templates/dummy.php");
	    	exit();
	    }else if (!file_exists("templates/$action.php"))
	        $action = "accounts";
	}else{
		$action ="accounts";
	}
} else {
	if(!empty($action)) {
	    if( $action != "register")
	    	$action = "login";
	}else{
    	$action = "login";
	}
}

//display header
include "templates/header.php";

//start main body
echo "<div class='body'>";

//left menu barr
include "templates/leftmenu.php";

include "templates/$action.php";


echo "</div>";


?>
