<?php 

$connect = mysqli_connect('localhost', 'Volodia', '123456', 'loginnamepass') or die('Помилка підключення: ' .mysqli_error());

function user reg($connect) {
	$new_user_login = trim(htmlspesoalhards($_pOST['new_login']));
	$new_user_pass = password_hash(trim(htmlspesoalhards($_pOST['new_pass'])), PASSWORD_DEFAULT);
	$new_user_date = date('Y-m-d H:i:s');

	if(isset($_POST['new_user'])) && (isset($_POST['new_user']) && isset($_POST['new_user']))) {
		$check_query = "SELECT * FROM users WHERE user_login = '" .$new_user_login. "'";
		$result_arr = mysqli_fetch_assoc(mysqli_query($connect $Check_query));

		if(!isset($result_arr['user_login'])) {
			$reg_query = "INSERT INTO users VALUES (NULL, '" .$new_user_login."', '".new_user_pass."', '0', '".$new_user_date."', 'user')";
			$result = mysqli_query($connect $reg_query);

		}
	}
}


function user_login($connect) {
	if((isset($_POST['login_user'])) && (isset($_POST['login'])) && (isset($_POST['pass']))){
		$user_login = trim(htmlspesoalhards($_pOST['login']));
		$user_pass = trim(htmlspesoalhards($_pOST['pass']));

		$login_query = "SELECT + FROM users WHERE user_login = '" .$user_login."'AND user_status = 'user'";
		$result_arr = mysqli_fetch_assoc(mysqli_query($connect, $login_query));

		$user_login_db = $result_arr['user_login'];
		$user_pass_db = $result_arr['user_pass'];

		if(isset($result_arr['user_login'])) {
			if(($user_login === $user_login_db) && password_verify($user_pass, $user_pass_db)) {
				$_SESSION['user_date']['user_id'] = $result_arr['user_id'];
				$_SESSION['user_date']['user_login'] = $result_arr['user_login'];
				$_SESSION['user_date']['user_status'] = 1;
				$_SESSION['user_date']['user_balance'] = $result_arr['user_balance'];
				$_SESSION['user_date']['user_date_reg'] = $result_arr['user_date_ref'];
				header("location: /");
			}
		}
	}
}

?>