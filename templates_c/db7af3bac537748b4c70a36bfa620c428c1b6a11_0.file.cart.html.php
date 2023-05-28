<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 10:26:19
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_64732c4b046839_61031453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db7af3bac537748b4c70a36bfa620c428c1b6a11' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\cart.html',
      1 => 1685269578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64732c4b046839_61031453 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
  .mybutton {
    width: 50px;
    height: 40px;
  }

  .mypic {
    width: 50px;
    height: 40px;
  }

  .box1 {
    grid-column-start: 1;
    grid-column-end: 4;
    grid-row-start: 1;
    grid-row-end: 3;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
  }

  .wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr 3fr 1fr 1fr 1fr 1fr 2fr;
    grid-auto-rows: minmax(60px, auto);
    height: 100px;
  }

  .wrap {
    display: grid;
    grid-template-columns: 10fr 2fr 2fr;
    grid-auto-rows: minmax(60px, auto);
  }
</style>

<h2>購物車</h2>

<div class="row">

  <ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_product']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
    <li class="wrapper">
      <div style="text-align: center;">
        <input class="form-check-input" style="margin-top: 30px;" type="checkbox" id="check_<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
"
          value="<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
" aria-label="..." onclick="cal_total();">
      </div>
      <div>
        <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['Name'];?>
"
            style="height: 70px;"></a>
      </div>
      <div>
        <p><?php echo $_smarty_tpl->tpl_vars['product']->value['Name'];?>
</p>
      </div>
      <!-- display each good price -->
      <div style="padding-left: 25px; padding-top: 10px;">
        <span>$</span>
        <span id="price<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['Price'];?>
</span>
      </div>
      <div style=" text-align: center; max-width: 100px;">
        <button class="btn btn-primary" style="max-width: 50px;" onclick="dec(<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
)">-</button>
      </div>
      <div style="padding-left: 25px; padding-top: 10px;">
        <span id="number<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
">1</span>
      </div>
      <div style="max-width: 100px;">
        <button class="btn btn-primary" style="max-width: 50px;" onclick="inc(<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
)">+</button>
      </div>
      <div style="padding-left: 5px;">
        <span>$</span>
        <span id="totalcost<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
" class="prod_total_cost" style="width: 35px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Price'];?>
</span>
        <button class="btn btn-block btn-danger" onclick="del_prod(<?php echo $_smarty_tpl->tpl_vars['product']->value['ID'];?>
)" style="margin-left: 30px; width: auto; max-width: 70px; display: inline;">刪除</button>
      </div>
    </li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
  <div class="wrap">
    <div></div>
    <div style="padding-left: 25px; padding-top: 10px;">
    </div>
    <div>
      <h3 id="total_price" class="text-center">$</h3>
      <button class="btn btn-block" onclick="" style="margin-bottom: 10px; width: 100px;">結帳</button>
    </div>
  </div>

</div>

<!-- calculate total cost -->
<?php echo '<script'; ?>
>
  function inc(p) {
    var number = document.getElementById('number' + p);
    var price = parseInt(document.getElementById('price' + p).innerHTML)
    var totalcost = document.getElementById('totalcost' + p)
    if (number.innerHTML > 0 && number.innerHTML < 10) {
      number.innerHTML = parseInt(number.innerHTML) + 1;
      totalcost.innerHTML = parseInt(number.innerHTML) * price
    }
    cal_total();
  }

  function dec(p) {
    var number = document.getElementById('number' + p);
    var price = parseInt(document.getElementById('price' + p).innerHTML)
    var totalcost = document.getElementById('totalcost' + p)
    if (number.innerHTML > 1) {
      number.innerHTML = parseInt(number.innerHTML) - 1;
      totalcost.innerHTML = parseInt(number.innerHTML) * price
    }
    cal_total();
  }

  function cal_total() {
    var total = 0;
    var total_cost = document.getElementsByClassName('prod_total_cost');
    for (var i = 0; i < total_cost.length; i++) {
      if (total_cost[i].parentElement.parentElement.getElementsByTagName('input')[0].checked) {
        total += parseInt(total_cost[i].innerHTML);
      }
    }
    document.getElementById('total_price').innerHTML = "NT$: " + total;
  }

  function del_prod(p) {
    var prod = document.getElementById('check_' + p);
    prod.parentElement.parentElement.remove();
    cal_total();
  }

  cal_total();
<?php echo '</script'; ?>
><?php }
}
