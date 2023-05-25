<?php
	require_once('header.php');
	$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
	//記得過濾成INT
	$show = isset($_REQUEST['show']) ? (int)filter_var($_REQUEST['show'],FILTER_SANITIZE_SPECIAL_CHARS) : 0;
	$page = isset($_REQUEST['page']) ? (int)filter_var($_REQUEST['page'],FILTER_SANITIZE_SPECIAL_CHARS) : 1;
	switch ($op) {
		case 'login':
			header("location:user.php?op=login");
			exit;
		break;
		default :
			if ($op=='display' && !empty($show)){
				show_one_list($show);
			}
			else {
				show_all_list();
			}
	break;
	}

	require("footer.php");

	// function show_all_list($pg){
	// 	global $smarty, $mysqli;
	// 	include_once "plugin/PageBar.php";
	// 	$sql = "SELECT * FROM `post` WHERE `post_hide` = 0 ORDER BY `post_time` desc";
	// 	$PageBar = getPageBar($sql, 2, 5);
	// 	$bar = $PageBar['bar'];
	// 	$sql = $PageBar['sql'];
	// 	$total = $PageBar['total'];
	// 	$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
	// 	$i = 0;
	// 	while ($po = $result->fetch_assoc()) {
	// 		$all_post[$i] = $po;
	// 		$all_post[$i]['picture'] = get_pic($po['post_number'],'small');
	// 		$i++;
	// 	}
	// 	$smarty->assign('all_post',$all_post);
	// 	$smarty->assign('total', $total);
	// 	$smarty->assign('bar', $bar);
	// }

	function show_all_list(){
		global $smarty, $mysqli;
		include_once "plugin/PageBar.php";
		$sql = "SELECT * FROM `product` WHERE `sellType` > 0";
		$PageBar = getPageBar($sql, 9, 1);
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$total = $result->num_rows;
		$i = 0;
		while ($prod = $result->fetch_assoc()) {
			$all_product[$i] = $prod;
			$all_product[$i]['picture'] = get_pic($prod['ID'],'small');
			$i++;
		}
		$smarty->assign('all_product',$all_product);
		$smarty->assign('total', $total);
	}

	function show_one_list($shownum){
		global $smarty, $mysqli,$isadmin;
		if ($isadmin == false){
			$sql = "UPDATE post set `post_hot`=`post_hot`+1 WHERE `post_number`={$shownum}";
			$mysqli->query($sql);
		}
		$sql = "SELECT * FROM `post` WHERE `post_number`='{$shownum}'";
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$post = $result->fetch_assoc();
		$post['picture'] = get_pic($post['post_number'],'big');
		$smarty->assign('post',$post);
	}

?>