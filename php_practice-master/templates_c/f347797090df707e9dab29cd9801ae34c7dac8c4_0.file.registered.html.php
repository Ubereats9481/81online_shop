<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-29 21:24:39
  from '/var/www/html/fakemd/templates/registered.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e80a197301f20_10106531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f347797090df707e9dab29cd9801ae34c7dac8c4' => 
    array (
      0 => '/var/www/html/fakemd/templates/registered.html',
      1 => 1581427940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e80a197301f20_10106531 (Smarty_Internal_Template $_smarty_tpl) {
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
