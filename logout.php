<?php
session_start();
if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){
	unset($_SESSION["login"]);   
	session_destroy(); 
	header('Location:'.$host.'index.php');
	exit;
}
 
?>
