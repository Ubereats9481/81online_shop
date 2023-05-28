<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 01:58:00
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\display_user.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6472b52888ce86_20631463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dbd6f84f7fb68bd19bbb6b98af577dc455cdeca' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\display_user.html',
      1 => 1685210281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6472b52888ce86_20631463 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>用戶資料</h1>
<br>
<form action="user.php" method="POST" class="form-horizontal" id="user_form">
    <input type="hidden" name="op" value="user_change">
    <div class="form-group">
        <label for="user_id">帳號</label>
        <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
" placeholder="帳號" disabled>
    </div>
    <div class="form-group">
        <label for="user_pw">生日</label>
        <input class="form-control" id="birth" name="birth" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['birth'];?>
" placeholder="2000-01-31" required>
    </div>
    <div class="form-group">
        <label for="user_pw">Email (選填)</label>
        <input class="form-control" id="email" name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
" placeholder="abc@example.com">
    </div>
    <div class="form-group">
        <label for="user_pw">手機 (選填)</label>
        <input class="form-control" id="phone" name="phone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['phone'];?>
" placeholder="0912345678" pattern="09[0-9]<?php echo 8;?>
">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="更新資料">
        <a class="btn btn-danger" href="user.php?op=change_pw">修改密碼</a>
        <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
            <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
        <?php }?>
    </div>

</form><?php }
}
