<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-21 04:54:59
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6469a4230efb69_21296777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0df35b3b4e453b26c658031dc293389eafc6e1be' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\login.html',
      1 => 1683694117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6469a4230efb69_21296777 (Smarty_Internal_Template $_smarty_tpl) {
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
