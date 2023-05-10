<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-06 13:39:07
  from '/var/www/html/templates/show_one_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3ba67be94ca8_91561274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21b545b99a21f5bc042a64ab82bb82b72c66bbe9' => 
    array (
      0 => '/var/www/html/templates/show_one_post.html',
      1 => 1580967487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3ba67be94ca8_91561274 (Smarty_Internal_Template $_smarty_tpl) {
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
