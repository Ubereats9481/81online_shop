<?php
if (!empty($msg)) {
    $smarty->assign('msg',$msg);
}
$smarty->assign('shop_name' , _shop_name);
$smarty->assign('op',$op);
$smarty->display('index.html');
?>