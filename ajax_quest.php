<?php
session_start();
if(!isset($_SESSION["login"]) && empty($_SESSION["login"])){
exit;
}

		$server = "127.0.0.1";
		$username = "mysql";
   		$password = "mysql";
    	$database = "sitewithchat";
    	$mysqli = new mysqli($server, $username, $password, $database);

    	$idofchat = $_POST["chat"];
    	$result = $mysqli->query("SELECT messages.nameofsender, messages.message, users.color FROM messages JOIN users ON messages.nameofsender = users.login WHERE idofchat = ".$idofchat);
    	$rows = mysqli_num_rows($result);
    	$arrays = array();
    	$namesArr = array();
    	$messagesArr = array();
    	$colorsArr = array();
	    for ($i=0; $i < $rows; $i++) { 
	    	$row = mysqli_fetch_row($result);
	    	$namesArr[] = $row[0];
	    	$messagesArr[] = $row[1];
	    	$colorsArr[] = $row[2];
	    	
			// echo '<p><span style="color: '.$row[2].';font-weight: 750;" >'.strip_tags($row[0]).': </span><span style="color: blue;font-weight: 750;" ></span><span>'.strip_tags($row[1]).'</span></p>';
	    }
		$arrays[] = $namesArr;
		$arrays[] = $messagesArr;
		$arrays[] = $colorsArr;
		echo json_encode($arrays);
?>

	
