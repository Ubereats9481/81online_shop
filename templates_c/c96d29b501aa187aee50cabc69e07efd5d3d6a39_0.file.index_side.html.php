<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-06 23:19:56
  from '/var/www/html/templates/index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3c2e9cbe8e48_37964094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c96d29b501aa187aee50cabc69e07efd5d3d6a39' => 
    array (
      0 => '/var/www/html/templates/index_side.html',
      1 => 1581002389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3c2e9cbe8e48_37964094 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-primary">
	<div class="panel-heading">功能表</div>
	<div class="panel-body">
		<?php if ($_smarty_tpl->tpl_vars['isuser']->value) {?>
		<div class='alert alert-success'>Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
</div>
		<a href="index.php" class="btn btn-block btn-primary">首頁</a>
		<?php if ($_smarty_tpl->tpl_vars['isadmin']->value) {?>
		<a href="tool.php?op=list" class="btn btn-block btn-success">內容</a>
		<?php }?>
		<a href="user.php?op=logout" class="btn btn-block btn-danger">登出</a>
		<?php } else { ?>
		<form action="index.php" method="post" role="form" class="form-horizontal">
			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-8">
					<a href="user.php?op=login" class="btn btn-block btn-primary">登入</a>
					<a href="user.php?op=registered" class="btn btn-block btn-success">註冊</a>
				</div>
			</div>

		</form>
		<?php }?>

	</div>
</div><?php }
}
