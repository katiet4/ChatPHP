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

<script type="text/javascript">
	
function validate_form_for_login(){

	var password = document.contact_form.password.value;
	var passwordrpt = document.contact_form.passwordrpt.value;
	if (password == passwordrpt) {
		return true;
	}
	document.contact_form.password.style = "border-color:red;";
	document.contact_form.passwordrpt.style = "border-color:red;";
	return false;

	}

</script>


<main class = "form">

	<form name="contact_form" action="registration_doing.php" method = "POST" onsubmit="return validate_form_for_login();"> 
		
		<p>	<input type="text" name="nickname" placeholder="Nickname or login" class="form-input" required>	</p>
		<p>	<input type="password" name="password" placeholder="Password" class="form-input" required>		</p>
		<p>	<input type="password" name="passwordrpt" placeholder="Repeat password" class="form-input" required>		</p>
		<p>	<input type="submit" name="sub" value = "Войти" class="form-input" id= 'submit'></p>

	</form>

</main>
<?php
require_once("footer.php");
?>