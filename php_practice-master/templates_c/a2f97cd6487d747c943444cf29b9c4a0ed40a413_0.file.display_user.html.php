<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-05 16:07:50
  from '/var/www/html/templates/display_user.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3a77d633da50_45700812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2f97cd6487d747c943444cf29b9c4a0ed40a413' => 
    array (
      0 => '/var/www/html/templates/display_user.html',
      1 => 1580890068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3a77d633da50_45700812 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>用戶資料</h1>
    <form action="user.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-3 control-label">帳號</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="請輸入帳號">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">密碼</label>
            <div class="col-md-9">
                <input class="form-control" id="user_pw" name="user_pw" type="password" placeholder="請輸入密碼">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="hidden" name="op" value="login" id="login">
                <input type="submit" class="btn btn-primary" value="登入">
                <a href="index.php?op=registered" class="btn btn-success">註冊</a>
            </div>
        </div>

    </form>

    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
><?php }
}
