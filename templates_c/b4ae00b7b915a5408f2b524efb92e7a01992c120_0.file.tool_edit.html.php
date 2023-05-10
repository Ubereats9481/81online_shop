<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-29 21:25:32
  from '/var/www/html/fakemd/templates/tool_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e80a1cca14c28_18536526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4ae00b7b915a5408f2b524efb92e7a01992c120' => 
    array (
      0 => '/var/www/html/fakemd/templates/tool_edit.html',
      1 => 1580808464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e80a1cca14c28_18536526 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>編輯內容</h1>
<?php echo '<script'; ?>
 src="ckeditor4-major/ckeditor.js"><?php echo '</script'; ?>
>
    <form action="tool.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" id="postform">
        <div class="form-group">
            <label class="col-md-2 control-label">標題: </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="post_title" id="post_title" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_title'];?>
" placeholder="請輸入標題">
            </div>
        </div>
        <div class="radio">
            <?php if ($_smarty_tpl->tpl_vars['post']->value['post_hide'] == 1) {?>
            <label class="radio-inline">顯示<input type="radio" name="post_hide" id="post_title" value="0"></label> 
            <label class="radio-inline">隱藏<input type="radio" name="post_hide" id="post_title" value="1" checked></label>
            <?php } else { ?>
            <label class="radio-inline">顯示<input type="radio" name="post_hide" id="post_title" value="0" checked></label> 
            <label class="radio-inline">隱藏<input type="radio" name="post_hide" id="post_title" value="1"></label>
            <?php }?>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">內容: </label>
            <div class="col-md-10">
                <textarea class="form-control" name="post_content" id="post_content" placeholder="請輸入內容"><?php echo $_smarty_tpl->tpl_vars['post']->value['post_content'];?>
</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">圖片: </label>
            <div class="col-md-10">
                <input type="file" name="post_picture" id="post_picture">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="hidden" name="op" value="editout" id="editout">
                <input type="hidden" name="post_number" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_number'];?>
">
                <input type="submit" class="btn btn-primary" value="修改">
            </div>
        </div>

    </form>

    <?php echo '<script'; ?>
>
        CKEDITOR.replace( 'post_content' );
    <?php echo '</script'; ?>
><?php }
}
