<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'chat';
    if ($isuser == false){
        echo "<script>alert(\"請先登入\");</script>";
        header("location:user.php?op=login");
    }
    require("footer.php");
?>