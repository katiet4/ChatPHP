<?php
session_start();
if(!isset($_SESSION["login"]) && empty($_SESSION["login"])){
	header('Location:'.$host.'index.php');
exit;
}	
	$server = "127.0.0.1";
	$username = "mysql";
	$password = "mysql";
	$database = "sitewithchat";
	$mysqli = new mysqli($server, $username, $password, $database);

	$nameofchats = $_POST["nameChat"];
	$result = $mysqli->query("INSERT INTO `nameofchats` (nameofchat) VALUES ('".$nameofchats."')");
	header('Location: http://127.0.0.1/chats.php');
?>