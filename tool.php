<?php
	require_once('header.php');
    if (!$isadmin) {
        header("location:index.php?op=home");
        exit;
    }
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $number = isset($_REQUEST['number']) ? (int)filter_var($_REQUEST['number'],FILTER_SANITIZE_SPECIAL_CHARS) : 0;
    switch ($op) {
        case 'post' :
            post();
        break;
        case 'postout' :
            $show = postout();
            if (save_picture($show) == false) {
                echo ("上傳圖片時出現錯誤");
            }
            header("location:index.php?show={$show}");
            exit;
        break;
        case 'edit' :
            post_edit($number);
            // header("location:index.php?show={$number}");
            // exit;
        break;
        case 'editout' :
            $numm = post_editout();
            header("location:index.php?op=display&show={$numm}");
            exit;
        break;
        case 'delete' :
            post_delete($number);
            header("location:index.php?op=home");
            exit;
        default:
    break;
    }

    
    require_once("footer.php");

    function post(){
        
    }

    function postout(){
            global $mysqli;
            $post_title = $mysqli->real_escape_string($_REQUEST['post_title']);
            $post_content = $mysqli->real_escape_string($_REQUEST['post_content']);
            $post_hide = $mysqli->real_escape_string($_REQUEST['post_hide']);
            $post_time = date("Y-m-d H:i:s");
            $sql = "INSERT INTO post (post_title,post_content,post_hot,post_time,post_hide) VALUES ('{$post_title}','{$post_content}','1','{$post_time}','{$post_hide}')";
            $mysqli->query($sql);
            $post_number = $mysqli->insert_id;
            return $post_number;
    }

    function save_picture($number = "") {
            require_once("plugin/class.upload.php");
            $pic = new Upload($_FILES['post_picture'], 'zh_TW');
            if ($pic->uploaded) {
                //big
                $pic->file_new_name_body = $number;
                $pic->file_overwrite     = true;
                $pic->image_resize       = true;
                $pic->image_x            = 600;
                $pic->image_y            = 400;
                $pic->image_convert      = 'png';
                $pic->image_ratio_crop   = true;
                $pic->Process('upload_picture/big/');
                if (!$pic->processed) {
                    return false;
                }
                //small
                $pic->file_new_name_body = $number;
                $pic->file_overwrite     = true;
                $pic->image_resize       = true;
                $pic->image_x            = 300;
                $pic->image_y            = 200;
                $pic->image_convert      = 'png';
                $pic->image_ratio_crop   = true;
                $pic->Process('upload_picture/small/');
                if ($pic->processed) {
                    $pic->Clean();
                }
                else {
                    return false;
                }
            }
    }

    function post_edit($shownum) {
        global $smarty, $mysqli;
        if (empty($shownum)) {
            return;
        }
		$sql = "SELECT * FROM `post` WHERE `post_number`='{$shownum}'";
		$result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$post = $result->fetch_assoc();
		$post['picture'] = get_pic($post['post_number'],'small');
		$smarty->assign('post',$post);
    }

    function post_editout(){
        global $mysqli;
        $post_title = $mysqli->real_escape_string($_REQUEST['post_title']);
        $post_content = $mysqli->real_escape_string($_REQUEST['post_content']);
        $post_hide = $mysqli->real_escape_string($_REQUEST['post_hide']);
        $post_time = date("Y-m-d H:i:s");
        $post_number = (int)$mysqli->real_escape_string($_REQUEST['post_number']);
        $sql = "UPDATE post set `post_title`='{$post_title}',`post_content`='{$post_content}',`post_time`='{$post_time}',`post_hide`='{$post_hide}' WHERE `post_number`={$post_number}";
        $mysqli->query($sql);
        return $post_number;
}

    function post_delete($number) {
        global $mysqli;
        $sql = "UPDATE post set `post_hide`=2 WHERE `post_number`={$number}";
        $mysqli->query($sql);
    }

?>