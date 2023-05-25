<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-25 06:30:51
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\registered.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_646f009b95ec80_34446976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aadc4b6779529382967075df4f14cc6e05ce4bec' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\registered.html',
      1 => 1684768794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f009b95ec80_34446976 (Smarty_Internal_Template $_smarty_tpl) {
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
