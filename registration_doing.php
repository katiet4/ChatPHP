<?php
session_start();
if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){

header('Location: '.$host.'chats.php');
exit;
}


elseif(empty($_POST["sub"])){
	header('Location:'.$host.'registration.php');
}
	$nickname = strip_tags($_POST["nickname"]);
	$passwordforlogin = $_POST["password"];
	$passwordforloginRpt = $_POST["passwordrpt"];
	if(!empty($nickname) && !empty($passwordforlogin) && $passwordforlogin == $passwordforloginRpt)
	{
		$server = "127.0.0.1";
		$username = "mysql";
   		$password = "mysql";
    	$database = "sitewithchat";
    	$mysqli = new mysqli($server, $username, $password, $database);
	   
	    $result = $mysqli->query("SELECT * FROM users WHERE login = '".$nickname."'");
	    $rows = mysqli_num_rows($result);
		if ($rows == 0)
		{	
			$result2 = $mysqli->query("INSERT INTO `users` (login, password, color) VALUES('".$nickname."','".$passwordforlogin."','blue')");
			header('Location:'.$host.'index.php');
		}
		else{
			header('Location:'.$host.'registration.php');
		}
	}

	else
	{
		header('Location:'.$host.'registration.php');
	}
	

?>