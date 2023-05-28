<?php
	require_once('header.php');

	$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$user_number = isset($_SESSION['user_number']) ? (int)filter_var($_SESSION['user_number'],FILTER_SANITIZE_SPECIAL_CHARS) : -1;
	$birth = isset($_REQUEST['birth']) ? filter_var($_REQUEST['birth'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$email = isset($_REQUEST['email']) ? filter_var($_REQUEST['email'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$phone = isset($_REQUEST['phone']) ? filter_var($_REQUEST['phone'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$ori_pw = isset($_REQUEST['ori_pw']) ? filter_var($_REQUEST['ori_pw'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$aft_pw1 = isset($_REQUEST['aft_pw1']) ? filter_var($_REQUEST['aft_pw1'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	$aft_pw2 = isset($_REQUEST['aft_pw2']) ? filter_var($_REQUEST['aft_pw2'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
	switch ($op) {
		case 'registered':
			registered($user_number);
		break;
		case 'registered_insert':
			registered_insert();
		break;
		case 'display_user':
			display_user($user_number);
		break;
		case 'user_change':
			user_change($user_number);
		break;
		case 'user_change_update':
			user_change_update($user_number);
			header("location:user.php?op=display_user");
			exit;
		break;
		case 'login':
			// login();
		break;
		case 'change_pw':
			// change_pw($user_number);
			break;
		case 'forget_pw':
			break;
		case 'update_pw':
			change_pw($user_number);
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
	
	function login(){
		
	}

	function loginout(){
		global $admin_array,$mysqli,$msg,$smarty;
		$user_id = filter_var($_REQUEST['user_id'],FILTER_SANITIZE_SPECIAL_CHARS);
		if (!empty($user_id)) {
			if ($_POST['captcha'] != $_SESSION['captcha']) {
				$msg = "驗證碼錯誤";
				return;
			}
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
            $sql = "INSERT INTO `user` (`user_id`,`user_pw`,`email`,`phone`,`birth`) VALUES ('{$user_id}','{$user_pw}','{$email}','{$phone}','{$birth}')";
			$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
			$user_number = $mysqli->insert_id;
			$_SESSION['user_number'] = $user_number;
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_rank'] = $user['Rank'];
			header("location:index.php?op=home");
			exit;
			//return $user_number;
	}

	function display_user($number){
		if ($number == -1){
			header("location:user.php?op=login");
			exit;
		}
		global $mysqli,$smarty;
		$sql = "SELECT * FROM `user` WHERE `user_number`='{$number}'";
		$result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$user_info = $result->fetch_assoc();
		$smarty->assign('user_info',$user_info);
	}

	function user_change($number){
		if ($number == -1){
			header("location:user.php?op=login");
			exit;
		}
		global $mysqli, $smarty, $phone, $email, $birth;
		if ($phone == ""){
			$phone = NULL;
		}
		if ($email == ""){
			$email = NULL;
		}
		if ($birth != ""){
			$sql = "UPDATE `user` SET `phone`='{$phone}',`birth`='{$birth}',`email`='{$email}' WHERE `user_number`='{$number}'";
		}
		else{
			echo "<script>alert('請輸入生日'); location.href = 'user.php?op=display_user';</script>";
			exit;
		}
		$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		echo "<script>alert('修改成功'); location.href = 'user.php?op=display_user';</script>";
	}

	function user_change_update($number){
		global $mysqli;
		foreach ($_POST as $var_name => $var_val) {
			$$var_name = $mysqli->real_escape_string($var_val);
		}
            $user_pw = password_hash($_REQUEST['user_pw'], PASSWORD_DEFAULT);
			$sql = "UPDATE `user` SET `user_id`={$user_id},`user_pw`={$user_pw} WHERE `user_number`={$number}";
            $mysqli->query($sql);
			$user_number = $mysqli->insert_id;
			$_SESSION['user_number'] = $user_number;
			$_SESSION['user_id'] = $user_id;
			$_REQUEST['user_number'] = $user_number;
            return $user_number;
	}
	function change_pw($number){
		global $admin_array,$mysqli,$msg,$smarty,$ori_pw, $aft_pw1, $aft_pw2;
		if ($number == -1){
			header("location:index.php?op=home");
			exit;
		}
		if($aft_pw1 != $aft_pw2){
			$msg = "請確認兩次新密碼輸入相同";
			return;
		}
		$sql = "SELECT * FROM `user` WHERE `user_number`='{$number}'";
		$result = $mysqli->query($sql);
		$user = $result->fetch_assoc();
		if (password_verify($ori_pw, $user['user_pw'])){
			$user_pw = password_hash($aft_pw1, PASSWORD_DEFAULT);
			$sql = "UPDATE `user` SET `user_pw`='{$user_pw}' WHERE `user_number`='{$number}'";
			$mysqli->query($sql);
			echo "<script>alert('修改成功'); location.href = 'user.php?op=logout';</script>";
			exit;
		}
		else {
			$msg = "舊密碼輸入錯誤";
			return;
		}
		return;
	}

?>