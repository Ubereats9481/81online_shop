<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-11 21:32:22
  from '/var/www/html/templates/registered.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e42ace61f6d12_32770677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94341e3cb547c918ae11d91c73b3b7af5f19789f' => 
    array (
      0 => '/var/www/html/templates/registered.html',
      1 => 1581427940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e42ace61f6d12_32770677 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>用戶註冊</h1>

<form action="user.php" method="POST" class="form-horizontal" id="user_form">
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
                <input type="hidden" name="op" value="registered_insert" id="registered_insert">
                <input type="submit" class="btn btn-primary" value="註冊">
                <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
                   <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
                <?php }?>
            </div>
        </div>

    </form><?php }
}
