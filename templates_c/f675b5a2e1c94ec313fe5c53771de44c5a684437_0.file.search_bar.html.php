<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-24 07:12:59
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\search_bar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_646db8fb9ef521_88289892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f675b5a2e1c94ec313fe5c53771de44c5a684437' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\search_bar.html',
      1 => 1684912224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646db8fb9ef521_88289892 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- search bar on the top of the page -->
<form class="form-inline" action="index.php" method="get">
    <div class="row">
        <div class="form-group col-lg-2 col-md-2 col-sm-2">
            <select name="prodType" class="form-control">
                <option value="" selected>類別</option>
                <option value="dog">電腦/資訊</option>
                <option value="cat">文學</option>
                <option value="hamster">科學</option>
                <option value="parrot">CD唱片</option>
            </select>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <input type="text" class="form-control" id="search" name="search" placeholder="請輸入關鍵字">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
            <button type="submit" class="btn ">
            <img src="templates/web_image/search.jpg" width="20px">
        </button>
    </div>
        
    </div>
</form><?php }
}
