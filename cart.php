<?php
	require_once('header.php');
	$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
	//記得過濾成INT
  if(!isset($_COOKIE['cart_product'])){
		setcookie("cart_product", "0.0", time() + (86400 * 30), "/");
	}
	switch ($op) {
		default :
      cart();
			break;
	}

	require("footer.php");

	function cart(){
		global $smarty, $mysqli;
    $all_cart_product = explode("-", $_COOKIE['cart_product']);
    for ($i = 1; $i < count($all_cart_product); $i++) {
      $data = explode(".", $all_cart_product[$i]);
      $sql = "SELECT * FROM `product` WHERE `ID`='{$data[0]}'";
      $result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
      $product = $result->fetch_assoc();
      $product['ID'] = $data[0];
      $product['picture'] = get_pic($product['ID'],'small');
      $product['num'] = $data[1];
      $cart_product[$i] = $product;
    }
    $smarty->assign('cart_product',$cart_product);
		// $sql = "SELECT * FROM `product` WHERE `sellType` > 0";
		// $result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		// $total = $result->num_rows;
		// $i = 0;
		// while ($prod = $result->fetch_assoc()) {
		// 	$all_product[$i] = $prod;
		// 	$all_product[$i]['picture'] = get_pic($prod['ID'],'small');
		// 	$i++;
		// }
		// $smarty->assign('all_product',$all_product);
		// $smarty->assign('total', $total);
	}

?>