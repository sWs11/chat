<?php
	require_once 'functions.php';
	
	conect_DB();
        
	// query_messages();

	if (isset($_POST['message_field'])) {
		$message = trim($_POST['message_field']);
		$message = htmlentities($message);
		if(strlen($message) > 0 ){
							
			$query = "INSERT INTO messages (message, user_name) VALUES ('$message', '".$_COOKIE['user_login']."')";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		    if($result)
		    {
		    	header('Location: '.$_SERVER['REQUEST_URI']);
		        echo "<span style='color:blue;'>Повідомлення відправлено</span>";
		    }	
					
		}
	}
?>
	<h1>Ви війшли як <?php echo $_COOKIE['user_login']; ?></h1>
	<h1>
		<form action="" method="post">
			<input type="submit" name="logout" value="Вихід">
		</form>
	</h1>	
	
	<form action="" method="post" id="send_form">
		<textarea name="message_field" id="message_fild" cols="30" rows="3" placeholder="Введіть ваше повідомлення"></textarea>
		<br>
		<input type="submit" id="send_message" value="Відправити">
	</form>
	
	<?php getMessages(); ?>
	
	<?php for($i = 0; $i < $count_message; $i++): ?>
		<?php 
			if ($all_messages[$i]['user_name'] == $_COOKIE['user_login']) {
				$user_class = "my_mess";
			} else {
				$user_class = "";
			}
		?>
		<div class="wrap_mess_block <?=$user_class ?> ">
			<div class="items_row" id="<?= $all_messages[$i]['user_name'] ?>"><?= $all_messages[$i]['user_name'] ?></div>
			<div class="items_row"><?= $all_messages[$i]['message'] ?></div>
			<div class="items_row"><?= $all_messages[$i]['time_send'] ?></div>
	 	</div>
	<?php endfor; ?>


	<?php
		// print_r($all_messages);
		close_DB(); 
	?>




