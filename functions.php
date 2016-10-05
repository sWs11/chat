<?php
	header("Content-Type: text/html; charset=UTF-8");
	function conect_DB() {

		$host = 'localhost'; 
		$database = 'chat'; 
		$user = 'root'; 
		$password = '27330t11'; 

		
/*		$host = 'mysql.zzz.com.ua'; // адрес сервера 
		$user = 'swsweb'; // і'мя користувача
		$password = '27330t11'; // пароль
		$database = 'sws_web_adr_com_ua'; //і'мя имя бази даних
*/
		global $link;
		$link = mysqli_connect($host, $user, $password, $database) 
		    or die("Ошибка " . mysqli_error($link));
		mysqli_query($link, "set names 'utf8'");
		mysqli_query($link, "SET CHARACTER SET 'utf8'");
	}
	
	function close_DB() {
		global $link;
		mysqli_close($link);
	}
	
	
	function registration() {
		global $link;
		$pass_reg = trim($_POST['pass_reg']); 
		$login_reg = trim($_POST['login_reg']);
		if(!(strlen($login_reg) < 6 || strlen($login_reg) > 31 || stristr($login_reg, ' '))){
			if(!(strlen($pass_reg) < 6 || strlen($pass_reg) > 31 || stristr($pass_reg, ' '))){
								
				$query = "select login from users where login='$login_reg'";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				if(mysqli_num_rows($result) == 0){
					
					$query = "INSERT INTO users (login, password) VALUES ('$login_reg', '$pass_reg')";
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
				    if($result)
				    {
				        echo "<span style='color:blue;'>Данные добавлены</span>";
				        user_cookie($login_reg, $pass_reg);
				    }	
				} else {
					echo 'Користувач з таким логіном вже існує';
				}		
			}else {
				echo "Довжина пароля повинна бути від 6 до 31 символу і не містити пробілів!";
			}
		}else {
			echo "Довжина логіна повинна бути від 6 до 31 символу і не містити пробілів!";
		}
	}
	
	function login() {
		global $link;
		$user_login = trim($_POST['login']);
		$user_pass = trim($_POST['pass']); 
		if(!(strlen($user_login) < 6 || strlen($user_login) > 31 || stristr($user_login, ' '))){
			if(!(strlen($user_pass) < 6 || strlen($user_pass) > 31 || stristr($user_pass, ' '))){
								
				$query = "select * from users where login='$user_login'";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				if(mysqli_num_rows($result) != 0){
					$row = mysqli_fetch_assoc($result);
					if($row['password'] === $user_pass) {
						user_cookie($row['login'], $row['password']);
					} else {
						echo 'Ви ввели невірний пароль!';
					}
				} else {
					
					echo 'Користувача з таким логіном не існує!';
				}		
			}else {
				echo "Введено некоректні дані!";
			}
		}else {
			echo "Введено некоректні дані!";
		}
	}
	
	function logout() {
		setcookie("user_login", "");
		setcookie("user_pass", "");
	}
	
	function user_cookie($log, $pass) {
		setcookie("user_login", $log);
		setcookie("user_pass", $pass);
	}

	$all_messages = [];
	$count_message;

	function getMessages() {
		global $link;
		global $all_messages; 
		global $count_message; 
		global $option_message; 
		$query_select_messages = "SELECT message, user_name, time_send FROM messages ORDER BY time_send DESC ";
		$result_select_messages = mysqli_query($link, $query_select_messages) or die("Ошибка " . mysqli_error($link));
		$count_message = mysqli_num_rows($result_select_messages);

		for($i = 0; $i < $count_message; $i++){

			$option_message = mysqli_fetch_assoc($result_select_messages);
			array_push($all_messages, $option_message);
	
			/*echo $option_message['user_name'].": ".$option_message['message']." // ".$option_message['time_send']."<br>"; */
	 	}
	}
?>