<?php

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Super puper chat</title>
</head>
<body>
<?php
	require_once 'functions.php';
	
	conect_DB();
        
	// query_messages();

	if (isset($_POST['message_field'])) {
		$message = trim($_POST['message_field']);
	
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
	
	<form action="" method="post">
		<textarea name="message_field" id="message_fild" cols="30" rows="3" placeholder="Введіть ваше повідомлення"></textarea>
		<br>
		<input type="submit" value="Відправити">
	</form>
	

	<?php  
		$query_select_messages = "SELECT message, user_name, time_send FROM messages ORDER BY time_send DESC ";
		$result_select_messages = mysqli_query($link, $query_select_messages) or die("Ошибка " . mysqli_error($link));
		$count_message = mysqli_num_rows($result_select_messages);

		$all_messages = [];

		for($i = 0; $i < $count_message; $i++):

			$option_message = mysqli_fetch_assoc($result_select_messages);
			array_push($all_messages, $option_message);
	?>

			<?php echo $option_message['user_name'].": ".$option_message['message']." // ".$option_message['time_send']."<br>"; ?>

	<?php endfor; ?>
	<?php
		// print_r($all_messages);
		close_DB(); 
	?>

</body>
</html>



