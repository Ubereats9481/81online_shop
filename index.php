<?php
	require_once('header.php');
	$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
	//記得過濾成INT
	$show = isset($_REQUEST['show']) ? (int)filter_var($_REQUEST['show'],FILTER_SANITIZE_SPECIAL_CHARS) : 0;
	$page = isset($_REQUEST['page']) ? (int)filter_var($_REQUEST['page'],FILTER_SANITIZE_SPECIAL_CHARS) : 1;
	if(!isset($_COOKIE['cart_product'])){
		setcookie("cart_product", "0.0", time() + (86400 * 30), "/");
	}
	switch ($op) {
		case 'login':
			header("location:user.php?op=login");
			exit;
			break;
		case 'rank':
			get_rank();
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

	function show_all_list(){
		global $smarty, $mysqli;
		$sql = "SELECT * FROM `product` WHERE `sellType` > 0";
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
		$sql = "UPDATE product set `hot`=`hot`+1 WHERE `ID`='{$shownum}'";
		$mysqli->query($sql);
		$sql = "SELECT * FROM `product` WHERE `ID`='{$shownum}'";
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$product = $result->fetch_assoc();
		/*$post['picture'] = get_pic($post['post_number'],'big');*/
		$smarty->assign('product',$product);
	}

	function get_rank(){
		global $smarty, $mysqli;
		// hot_rank_book
		$sql = "SELECT * FROM `product` WHERE `sellType` > 0 AND `prodType` != 'cd' ORDER BY `hot` DESC";
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$i = 0;
		while ($prod = $result->fetch_assoc()) {
			$hot_rank_b[$i] = $prod;
			$hot_rank_b[$i]['picture'] = get_pic($prod['ID'],'small');
			$i++;
			if($i >= 10){
				break;
			}
		}
		$smarty->assign('hot_rank_b',$hot_rank_b);
		// sell_rank_book
		$sql = "SELECT * FROM `product` WHERE `sellType` > 0 AND `prodType` != 'cd' ORDER BY `Remaining` ASC";
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$i = 0;
		while ($prod = $result->fetch_assoc()) {
			$sell_rank_b[$i] = $prod;
			$sell_rank_b[$i]['picture'] = get_pic($prod['ID'],'small');
			$i++;
			if($i >= 10){
				break;
			}
		}
		$smarty->assign('sell_rank_b',$sell_rank_b);
		// hot_rank_cd
		$sql = "SELECT * FROM `product` WHERE `sellType` > 0 AND `prodType` = 'cd' ORDER BY `hot` DESC";
		echo $sql;
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$i = 0;
		while ($prod = $result->fetch_assoc()) {
			$hot_rank_cd[$i] = $prod;
			$hot_rank_cd[$i]['picture'] = get_pic($prod['ID'],'small');
			$i++;
			if($i >= 10){
				break;
			}
		}
		$smarty->assign('hot_rank_cd',$hot_rank_cd);
		// sell_rank_cd
		$sql = "SELECT * FROM `product` WHERE `sellType` > 0 AND `prodType` = 'cd' ORDER BY `Remaining` ASC";
		echo $sql;
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$i = 0;
		while ($prod = $result->fetch_assoc()) {
			$sell_rank_cd[$i] = $prod;
			$sell_rank_cd[$i]['picture'] = get_pic($prod['ID'],'small');
			$i++;
			if($i >= 10){
				break;
			}
		}
		$smarty->assign('sell_rank_cd',$sell_rank_cd);
	}

?>