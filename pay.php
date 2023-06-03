<?php
	require_once('header.php');
	$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
	//記得過濾成INT
    if(!isset($_COOKIE['cart_product'])){
        header("location:index.php?op=home");
        exit;
	}
	switch ($op) {
        case 'pay_out':
            pay_out();
            break;
		default :
            pay();
			break;
	}

	require("footer.php");

	function pay(){
        if(!isset($_COOKIE['pay_list']) || !isset($_SESSION['user_id'])){
            echo "<><script>alert('未選取商品或未登入');location.href='index.php?op=home';</script>";
            exit;
        }
		global $smarty, $mysqli;
        $all_pay_product = explode("-", $_COOKIE['pay_list']);
        for ($i = 1; $i < count($all_pay_product); $i++) {
            $data = explode(".", $all_pay_product[$i]);
            $sql = "SELECT * FROM `product` WHERE `ID`='{$data[0]}'";
            $result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
            $product = $result->fetch_assoc();
            $product['ID'] = $data[0];
            $product['picture'] = get_pic($product['ID'],'small');
            $product['num'] = $data[1];
            $pay_product[$i] = $product;
        }
        $smarty->assign('pay_list',$pay_product);
	}

    function pay_out(){
        global $smarty, $mysqli;
        // 建立訂單
        $carry = isset($_REQUEST['carry']) ? filter_var($_REQUEST['carry'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $company = isset($_REQUEST['company']) ? filter_var($_REQUEST['company'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $price_pay = isset($_REQUEST['price_pay']) ? filter_var($_REQUEST['price_pay'],FILTER_SANITIZE_SPECIAL_CHARS) : 0;
        $sql = "INSERT INTO `order_pri` (`user_number`,`buyer_name`,`phone`,`address`,`carrier`,`tax_id`,`price`) VALUES ('{$_SESSION['user_number']}','{$_REQUEST['buyer_name']}','{$_REQUEST['phone']}','{$_REQUEST['address']}','{$carry}','{$company}','{$price_pay}')";
        $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
        // 建立訂單商品
        $order_id = $mysqli->insert_id;
        $all_pay_product = explode("-", $_COOKIE['pay_list']);
        for ($i = 1; $i < count($all_pay_product); $i++) {
            $data = explode(".", $all_pay_product[$i]);
            $product['ID'] = $data[0];
            $product['num'] = $data[1];
            $sql = "INSERT INTO `order_product` (`order_id`,`prod_id`,`amount`) VALUES ('{$order_id}','{$product['ID']}','{$product['num']}')";
            $mysqli->query($sql) or die($sql."在查詢資料庫時發生錯誤");
        }
        echo "<script>alert('訂單已送出');location.href='index.php?op=home';</script>";
    }

?>