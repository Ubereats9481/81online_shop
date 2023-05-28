<?php

    function get_pic($num,$bm) {
        $filename = "upload_picture/{$num}.webp";
        if (file_exists($filename)) {
            return $filename;
        }
        else {
            //die("error");
        }
    }

?>
