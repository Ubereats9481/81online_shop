<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-31 00:11:05
  from '/var/www/html/fakemd/templates/index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e821a19201227_07737614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8867fc3d6fba74c2f12c18b5c6eff395ac550ab' => 
    array (
      0 => '/var/www/html/fakemd/templates/index_side.html',
      1 => 1585584664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e821a19201227_07737614 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-primary">
	<div class="panel-heading">功能表</div>
	<div class="panel-body">
		<?php if ($_smarty_tpl->tpl_vars['isuser']->value) {?>
		<div class='alert alert-success'>Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
</div>
		<?php }?>
		<a href="index.php?op=home" class="btn btn-block btn-primary">首頁</a>
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
