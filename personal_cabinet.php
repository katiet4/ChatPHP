<?php
session_start();
if(!isset($_SESSION["login"]) && empty($_SESSION["login"])){
header('Location: '.$host.'index.php');
exit;
}

?>



<?php
require_once("header.php");
?>

<main id = 'account_page'>

	<div class = "info">
		<div>
			<ul>
				<li>login</li>
				<li>.......</li>
			</ul>
		</div>
		<div>
			<ul>
				<li>.......</li>
				<li>.......</li>
			</ul>
		</div>
		
	</div>
 	<hr/>
	<div class = "edit">
		<!-- <form action="" method="POST">
			<input type="file" name="img" placeholder="Nickname or login" class="form-input form-input-chat submit">
			<input type="submit" name="edit" value="Изменить" class="form-input form-input-chat submit">
		</form> -->
		<form id = "colorForm" action="change_color_of_login.php" method="POST">
			<select name="color" class = "form-input" onchange='document.getElementById("colorForm").submit()'>
				<option value="red">Красный</option>
				<option value="blue">Синий</option>
				<option value="green">Зелёный</option>
			</select>
		</form>
	</div>

</main>

<?php
require_once("footer.php");
?>

