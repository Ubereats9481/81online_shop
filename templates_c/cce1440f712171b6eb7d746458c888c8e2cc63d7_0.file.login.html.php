<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-12 12:20:03
  from '/var/www/html/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e437cf3c73df0_11884400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cce1440f712171b6eb7d746458c888c8e2cc63d7' => 
    array (
      0 => '/var/www/html/templates/login.html',
      1 => 1581427911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e437cf3c73df0_11884400 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>登入</h1>

    <form action="user.php" method="POST" class="form-horizontal" id="login_form" role="form">
        <div class="form-group">
            <label class="col-md-3 control-label">帳號</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="請輸入帳號" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">密碼</label>
            <div class="col-md-9">
                <input class="form-control" id="user_pw" name="user_pw" type="password" placeholder="請輸入密碼" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="hidden" name="op" value="loginout" id="loginout">
                <input type="submit" class="btn btn-primary" value="登入">
                <a href="user.php?op=registered" class="btn btn-success">註冊</a>
                <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
                   <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
                <?php }?>
            </div>
                
        </div>

    </form>

    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
><?php }
}
