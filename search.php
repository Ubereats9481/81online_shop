<?php
	require_once('header.php');

    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'search';
	$pdType = isset($_REQUEST['pdType']) ? filter_var($_REQUEST['pdType'],FILTER_SANITIZE_SPECIAL_CHARS) : "";
	$keyWord = isset($_REQUEST['keyWord']) ? filter_var($_REQUEST['keyWord'],FILTER_SANITIZE_SPECIAL_CHARS) : "";
	switch ($op) {
		default :
				show_all_list();
	            break;
	}

	require("footer.php");

	function show_all_list(){
		global $smarty, $mysqli , $pdType , $keyWord;
		include_once "plugin/PageBar.php";
        if ($pdType == "") {
            $sql = "SELECT * FROM `product` WHERE `sellType` > 0";
        } else {
            $sql = "SELECT * FROM `product` WHERE `sellType` > 0 AND `prodType` = '$pdType'";
        }
        if ($keyWord != "") {
            $sql = $sql." AND `Name` LIKE '%$keyWord%'";
        }
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

?>