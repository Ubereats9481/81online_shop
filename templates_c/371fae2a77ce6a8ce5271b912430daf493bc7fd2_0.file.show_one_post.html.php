<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-21 04:56:36
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_one_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6469a484555e75_97571426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '371fae2a77ce6a8ce5271b912430daf493bc7fd2' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_one_post.html',
      1 => 1683694117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6469a484555e75_97571426 (Smarty_Internal_Template $_smarty_tpl) {
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
