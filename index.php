<?php
session_start();
if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){
	header('Location: '.$host.'chats.php');
	exit;
}

?>


<?php
require_once("header.php");
?>


<main class = "form">

	<form action="login_doing.php" method="POST">
		
		<p>	<input type="text" name="nickname" placeholder="Nickname or login" class="form-input" required>	</p>
		<p>	<input type="password" name="password" placeholder="Password" class="form-input" required>		</p>
		<p>	<input type="submit" name="sub" value = "Войти" class="form-input submit"></p>
	</form>

</main>



<?php
require_once("footer.php");
?>