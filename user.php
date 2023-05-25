<?php
	require_once('header.php');

	$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$number = isset($_REQUEST['number']) ? (int)filter_var($_REQUEST['number'],FILTER_SANITIZE_SPECIAL_CHARS) : 0;
	switch ($op) {
		case 'registered':
			registered($number);
		break;
		case 'registered_insert':
			registered_insert();
		break;
		case 'display_user':
			display_user($number);
		break;
		case 'user_change':
			user_change($number);
		break;
		case 'user_change_update':
			user_change_update($number);
			header("location:index.php?op=home");
			exit;
		break;
		case 'login':
			//login();
		break;
		case 'loginout':
			loginout();
		break;
		case 'logout':
			logout();
			header("location:index.php?op=home");
			exit;
		break;
		default :
			header("location:index.php?op=home");
			exit;
		break;
	}

	require("footer.php");
	
	function loginout(){
		global $admin_array,$mysqli,$msg,$smarty;
		$user_id = filter_var($_REQUEST['user_id'],FILTER_SANITIZE_SPECIAL_CHARS);
		if (!empty($user_id)) {
			$sql = "SELECT * FROM `user` WHERE `user_id`='{$user_id}'";
			$result = $mysqli->query($sql);
			$user = $result->fetch_assoc();
			if (password_verify($_POST['user_pw'], $user['user_pw'])){
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_number'] = $user['user_number'];
				$_SESSION['user_rank'] = $user['Rank'];
				header("location:index.php?op=home");
				exit;
			}
			else {
				$msg = "帳號或密碼錯誤";
			}
			
		}
		else {
			$msg = "請輸入帳號";
		}
		return;
	}

	function logout() {
		unset($_SESSION['user_id']);
		unset($_SESSION['user_number']);
		unset($_SESSION['user_rank']);
	}

	function registered(){

	}

	function registered_insert(){
		global $mysqli,$msg;
		if (empty($_POST['user_id'])) {
			$msg = "請輸入帳號";
			return;
		}
		else if (empty($_POST['user_pw'])) {
			$msg = "請輸入密碼";
			return;
		}
		else if (strpos($_POST['user_id']," ")||strpos($_POST['user_pw']," ")) {
			$msg = "帳號和密碼不可包含空白";
			return;
		}
		foreach ($_POST as $var_name => $var_val) {
			$$var_name = $mysqli->real_escape_string($var_val);
		}
			$sql = "SELECT * FROM `user` WHERE `user_id`='{$user_id}'";
			$result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
			$user = $result->fetch_assoc();
			if (!empty($user)) {
				$msg = "帳號已存在";
				return;
			}
            $user_pw = password_hash($_REQUEST['user_pw'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`user_id`,`user_pw`) VALUES ('{$user_id}','{$user_pw}')";
            $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
			$user_number = $mysqli->insert_id;
			$_SESSION['user_number'] = $user_number;
			$_SESSION['user_id'] = $user_id;
			$_REQUEST['user_number'] = $user_number;
			header("location:index.php?op=home");
			exit;
			//return $user_number;
	}

	function display_user($number){

	}

	function user_change($number){

	}

	function user_change_update($number){
		global $mysqli;
		foreach ($_POST as $var_name => $var_val) {
			$$var_name = $mysqli->real_escape_string($var_val);
		}
            $user_pw = password_hash($_REQUEST['user_pw'], PASSWORD_DEFAULT);
			$sql = "UPDATE `user` SET `user_id`={$user_id},`user_pw`={$user_pw} WHERE user_number={$number}";
            $mysqli->query($sql);
			$user_number = $mysqli->insert_id;
			$_SESSION['user_number'] = $user_number;
			$_SESSION['user_id'] = $user_id;
			$_REQUEST['user_number'] = $user_number;
            return $user_number;
	}

?>