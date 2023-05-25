<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-25 05:13:02
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_all_product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_646eee5e02dab5_11830781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e30cdea20fdd83ba2f2d71330d399b1980ba1b92' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_all_product.html',
      1 => 1684991546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646eee5e02dab5_11830781 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row" id="prod_list">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_product']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
        <div class="col-sm-6 col-md-4 showProduct">
            <div class="thumbnail">
                <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['Name'];?>
"></a>
                <div class="caption">
                    <div style="height: 60px;">
                        <h4><a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name'];?>
</a></h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">剩餘數量: <?php echo $_smarty_tpl->tpl_vars['product']->value['Remaining'];?>
</div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
