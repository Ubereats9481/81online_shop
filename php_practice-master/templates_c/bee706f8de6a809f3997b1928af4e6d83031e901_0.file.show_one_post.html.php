<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-29 21:29:10
  from '/var/www/html/fakemd/templates/show_one_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e80a2a6bde160_86125376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bee706f8de6a809f3997b1928af4e6d83031e901' => 
    array (
      0 => '/var/www/html/fakemd/templates/show_one_post.html',
      1 => 1585488549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e80a2a6bde160_86125376 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
        <div class="col-sm-4">
                <img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_title'];?>
" class="img-thumbnail">
        </div>
        <div class="col-sm-8">
            <h2><?php echo $_smarty_tpl->tpl_vars['post']->value['post_title'];?>
</h2>
            熱度: <?php echo $_smarty_tpl->tpl_vars['post']->value['post_hot'];?>

            <?php if ($_smarty_tpl->tpl_vars['isadmin']->value == true) {?>
            <div> 
                <a href="tool.php?op=edit&number=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_number'];?>
" class="btn btn-warning">編輯文章</a>
                <a href="tool.php?op=delete&number=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_number'];?>
" class="btn btn-danger">刪除文章</a>
            </div>
            <?php }?>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>content:</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['post']->value['post_content'];?>
</p>
    </div>
</div><?php }
}
