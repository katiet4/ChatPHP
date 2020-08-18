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


<main id = 'chat_page'>
	


	<div class = 'rooms'>
		<?php
		$server = "127.0.0.1";
		$username = "mysql";
   		$password = "mysql";
    	$database = "sitewithchat";
    	$mysqli = new mysqli($server, $username, $password, $database);
    	$result = $mysqli->query("SELECT * FROM nameofchats");
	    $rows = mysqli_num_rows($result);
	    for ($i=0; $i < $rows; $i++) { 
	    	$row = mysqli_fetch_row($result);
			echo "<div class = 'room' onclick = 'open_any_chat(".$row[0].")'>".strip_tags($row[1])."</div>";
	    }

		?>
		<div class = 'room' onclick = 'open_creator_chats()'>+</div>
		<div id = "creator" style="display:none; 
										border:2px solid black;
										border-radius: 10px;
										background-color: white;
										position: absolute;
										width: 30%; 
										top:10%; 
										left: 25%;
										padding: 10%;
		">
		<form action="create_chat.php" method = "POST">
			<input type="text" name="nameChat" class="form-input form-input-chat" placeholder="Название чата" required>
			<input type="submit" name="sub" class="form-input form-input-chat" value="Создать">
		</form>
		<button  name="sub" class="form-input form-input-chat" onclick = 'close_creator_chats()'>
			Закрыть
		</button>
		</div>
		</div>

	<div class = 'chat'>
		
		<div class = 'chatText' id = 'chats_areas'>
			<?php

			$result = $mysqli->query("SELECT * FROM nameofchats");
	    	$rows = mysqli_num_rows($result);
		   	for ($i=0; $i < $rows; $i++) { 
	    		$row = mysqli_fetch_row($result);
	    		if($i==0){
	    			echo '<div class="form-area" id = "area-'.$row[0].'"></div>';
	    			continue;
	    		}
				echo '<div class="form-area" id = "area-'.$row[0].'" style="display:none;"></div>';
	  		  }

			?>
		</div>

		<div id = 'chats_forms'>
			<?php

			$result = $mysqli->query("SELECT * FROM nameofchats");
		   	for ($i=0; $i < $rows; $i++) { 
				$row = mysqli_fetch_row($result);
				if($i==0){
					echo '<div class = "chatInput" id = "input-'.$row[0].'">
						<input type="text" name="text-'.$row[0].'" class="form-input form-input-chat" style = "font-family: none;" placeholder="Введите сообщение">
						<input type="submit" name="send" value = "Отправить" class="form-input form-input-chat sub submit" onclick = "send_message('.$row[0].');">
						<input type="hidden" name="idofchat" value = "'.$row[0].'" >
						<input type="hidden" name="nameofsender" value = "'.$_SESSION["login"].'" >
						</div>';
						continue;
				}
				echo '<div class = "chatInput" id = "input-'.$row[0].'" style="display:none;">
					<input type="text" name="text-'.$row[0].'" class="form-input form-input-chat" style = "font-family: none;" placeholder="Введите сообщение">
					<input type="submit" name="send" value = "Отправить" class="form-input form-input-chat sub submit" onclick = "send_message('.$row[0].');">
				</div>';
				  }
			?>
		</div>

	</div>

</main>



<script type="text/javascript" src="static/chatsFoo.js"></script>

<?php
require_once("footer.php");
?>