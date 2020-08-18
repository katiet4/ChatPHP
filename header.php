<?php
session_start();
?>
<!DOCTYPE html>
<html class="full-height">
<head>
	<title></title>
	<script type="text/javascript" src = 'static/js.js'></script>
	<link href="https://allfont.ru/allfont.css?fonts=lobster" rel="stylesheet" type="text/css" />
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="static/style.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>	

</head>
<body>
	<header>
		<?php
		echo "<div  class = 'header'>";
		if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){
			echo "<div class='allLinks'>";

				echo "<div class = ' textHeader'>";
					echo "<a href = '/logout.php'>";
					echo "Выйти";
					echo "</a>";
					echo "<a href = '/chats.php'>";
					echo "Чат";
					echo "</a>";

					echo "<a href = '/personal_cabinet.php'>";
					echo "Аккаунт";
					echo "</a>";

				echo "</div>";
			echo "</div>";
		}

		else{
			echo "<div class='allLinks'>";
				echo "<div>";
					echo "<a href = '/index.php'>";
					echo "Войти";
					echo "</a>";
					echo "<a href = '/registration.php'>";
					echo "Регистрация";
					echo "</a>";
				echo "</div>";
			echo "</div>";
		}

		echo "</div>";
		
		$host = "http://192.168.1.68/";
		?>

	</header>
