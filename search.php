<?php
	require_once('header.php');

    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'search';
	$pdType = isset($_REQUEST['pdType']) ? filter_var($_REQUEST['pdType'],FILTER_SANITIZE_SPECIAL_CHARS) : "";
	$keyWord = isset($_REQUEST['keyWord']) ? filter_var($_REQUEST['keyWord'],FILTER_SANITIZE_SPECIAL_CHARS) : "";
	// $searchType = isset($_REQUEST['searchType']) ? (int)filter_var($_REQUEST['searchType'],FILTER_SANITIZE_SPECIAL_CHARS) : -1;
	$minPrice = isset($_REQUEST['minPrice']) ? (int)filter_var($_REQUEST['minPrice'],FILTER_SANITIZE_SPECIAL_CHARS) : 0;
	if (isset($_REQUEST['maxPrice']) && $_REQUEST['maxPrice'] != ""){
		$maxPrice = (int)filter_var($_REQUEST['maxPrice'],FILTER_SANITIZE_SPECIAL_CHARS);
		if ($maxPrice < $minPrice){
			$maxPrice = 999999;
		}
	}
	else{
		$maxPrice = 999999;
	}
	switch ($op) {
		default :
				show_all_list();
	            break;
	}

	require("footer.php");

	function show_all_list(){
		global $smarty, $mysqli , $pdType , $keyWord, $minPrice, $maxPrice;
        if ($pdType == "") {
            $sql = "SELECT * FROM `product` WHERE `sellType` > 0";
        } else {
            $sql = "SELECT * FROM `product` WHERE `sellType` > 0 AND `prodType` = '$pdType'";
        }
        if ($keyWord != "") {
            $sql = $sql." AND `Name` LIKE '%$keyWord%'";
        }
		$sql = $sql." AND `Price` >= $minPrice AND `Price` <= $maxPrice";
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
		$smarty->assign('pdType', $pdType);
	}

?>