<?php

    function get_pic($num,$bm) {
        $filename = "upload_picture/{$bm}/{$num}.png";
        if (file_exists($filename)) {
            return $filename;
        }
        else {
            //die("error");
        }
    }

?>
