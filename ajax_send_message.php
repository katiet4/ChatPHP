<?php
session_start();
if(!isset($_SESSION["login"]) && empty($_SESSION["login"])){
exit;
}

	$message = $_POST["message"];

	$nameofsender = $_POST["nameofsender"];

	$idofchat = $_POST["chat"];

		$server = "127.0.0.1";
		$username = "mysql";
   		$password = "mysql";
    	$database = "sitewithchat";
    	$mysqli = new mysqli($server, $username, $password, $database);

    	$result = $mysqli->query("SELECT * FROM users WHERE login = '".$nameofsender."'");
	    $rows = mysqli_num_rows($result);
	    if($rows != 0 && $nameofsender == $_SESSION["login"]){
	    	$result = $mysqli->query("SELECT * FROM nameofchats WHERE id = '".$idofchat."'");
	  		$rows = mysqli_num_rows($result);
	    	if($rows != 0){
	    		if($message != ""){
	    			$result2 = $mysqli->query("INSERT INTO `messages` (nameofsender, message, idofchat) VALUES('".$nameofsender."','".$message."',".$idofchat.")");
	    		}
	    	}
	    }
    	
	

?>