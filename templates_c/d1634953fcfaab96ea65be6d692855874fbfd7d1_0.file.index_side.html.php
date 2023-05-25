<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-25 07:12:26
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_646f0a5ac3eba1_22861476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1634953fcfaab96ea65be6d692855874fbfd7d1' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\index_side.html',
      1 => 1684998743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f0a5ac3eba1_22861476 (Smarty_Internal_Template $_smarty_tpl) {
?><div id = 'panel' class="panel panel-default">
	<div  id ="panel-heading" class="panel-heading"></div>
	<div id = "panel-body" class="panel-body">
		<?php if ($_smarty_tpl->tpl_vars['isuser']->value) {?>
		<div class='alert alert-success'>Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['isadmin']->value) {?>
		<a href="tool.php?op=list" class="btn btn-block btn-success">內容</a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['isuser']->value) {?>
		<a href="user.php?op=logout" class="btn btn-block btn-danger">登出</a>
		<?php }?>
		<?php if (!$_smarty_tpl->tpl_vars['isuser']->value) {?>
					<a href="user.php?op=login" class="btn btn-block btn-info">登入</a>
					<a href="user.php?op=registered" class="btn btn-block btn-success">註冊</a>
		<?php }?>

	</div>
</div><?php }
}
