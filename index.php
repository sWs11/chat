<?php
	require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
</head>
<body>
<?php
	require_once 'functions.php';
	
	conect_DB();
        
	if(isset($_POST['reg'])){
		registration();
//		print_r($_POST);
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
	
	if(isset($_POST['log'])){
		login();
//		print_r($_POST);
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
	
	if(isset($_POST['logout'])){
		logout();
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
	
	close_DB();   
?>

<?php 
	if(isset($_COOKIE['user_login']) && isset($_COOKIE['user_pass'])):
	require_once('main_page.php');
?>



<?php
	else:
?>


<h1>Реєстрація</h1>
<form action="" method="post">
	<input type="text" name="login_reg" id="login" placeholder="Логін">
	<input type="password" name="pass_reg" id="pass" placeholder="Пароль">
	<input type="submit" name="reg" value="Зареєструватись">
</form>
<hr>
<h1>Вхід</h1>
<form action="" method="post">
	<input type="text" name="login" id="login" placeholder="Логін">
	<input type="password" name="pass" id="pass" placeholder="Пароль">
	<input type="submit" name="log" value="Вхід">
</form>
<hr>
<?php
	endif;
?>


</body>
</html>