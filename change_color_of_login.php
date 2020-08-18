<?php
session_start();
if(!isset($_SESSION["login"]) && empty($_SESSION["login"])){
header('Location: '.$host.'index.php');
exit;
}


	$newColor = $_POST["color"];
	$server = "127.0.0.1";
	$username = "mysql";
	$password = "mysql";
	$database = "sitewithchat";
	$mysqli = new mysqli($server, $username, $password, $database);
	if($newColor == "red" || $newColor == "green" || $newColor == "blue"){
		$result = $mysqli->query("UPDATE users SET color = '".$newColor."' WHERE login = '".$_SESSION["login"]."'");	
	}
	header('Location: '.$host.'personal_cabinet.php');

?>