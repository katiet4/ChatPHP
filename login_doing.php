<?php
session_start();
if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){
	header('Location: '.$host.'chats.php');
	exit;
}
else{

	$loginofusr = $_POST['nickname'];
	$passwordofusr = $_POST['password'];
	if(!empty($loginofusr) && !empty($passwordofusr))
	{
		$server = "127.0.0.1";
		$username = "mysql";
   		$password = "mysql";
    	$database = "sitewithchat";
    	$mysqli = new mysqli($server, $username, $password, $database);
	    if (mysqli_connect_errno()) {
	        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
	        exit();
	    }
	    $result = $mysqli->query("SELECT * FROM users WHERE login = '".$loginofusr."'");
	    $rows = mysqli_num_rows($result);
		if ($rows == 1)
		{
			$row = mysqli_fetch_row($result);
			if($row[2] == $passwordofusr)
			{
				$_SESSION["login"] = $loginofusr;
				header('Location: '.$host.'chats.php');
			}
			else
			{
				header('Location: '.$host.'index.php');
			}
		}
		else{
			header('Location: '.$host.'index.php');
		}
	}
	else
	{
		header('Location: '.$host.'index.php');
	}
	
}

?>