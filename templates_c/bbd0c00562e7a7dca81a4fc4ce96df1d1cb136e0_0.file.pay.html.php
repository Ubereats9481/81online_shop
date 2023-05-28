<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-27 17:57:22
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\pay.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_64724482b3a034_27320056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbd0c00562e7a7dca81a4fc4ce96df1d1cb136e0' => 
    array (
      0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\pay.html',
      1 => 1685210241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64724482b3a034_27320056 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 結帳頁面 -->
<div class="pay_main">
  <div class="row">
    <div class="col-sm-12 col-centered">
      <!-- 商品 -->
      <!-- TODO: FIXME 抓購物車cookies的json並轉換成商品資料 -->
      <div class="buy_content">
        <h2>訂單內容</h2>
      </div>

      <!-- 物流 -->
      <!-- TODO: 取得物流方式value -->
      <div class="transport_method">
        <h2>運送方式</h2>
        <div class="form-group">
          <label class="radio-inline">
            <input
              type="radio"
              name="transport_options"
              id="inlineRadio1"
              value="option1"
              checked
            />
            宅配 (運費: 60)
          </label>
          <label class="radio-inline">
            <input
              type="radio"
              name="transport_options"
              id="inlineRadio2"
              value="option2"
            />
            超商取貨 (運費: 60)
          </label>
          <label class="radio-inline">
            <input
              type="radio"
              name="transport_options"
              id="inlineRadio3"
              value="option3"
            />
            i郵箱 (運費: 60)
          </label>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>
                <input
                  type="text"
                  id="buyer_name"
                  placeholder="請輸入中文姓名"
                />
              </label>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>
                <input
                  type="tel"
                  id="phone"
                  pattern="09[0-9]<?php echo 8;?>
"
                  placeholder="請輸入電話"
                />
              </label>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>
                <input type="text" id="address" placeholder="請輸入地址" />
              </label>
            </div>
          </div>
        </div>
      </div>
      <?php echo '<script'; ?>
><?php echo '</script'; ?>
>

      <!-- 付款 -->
      <!-- TODO: 取得付款方式value -->
      <div class="pay_method">
        <h2>付款方式</h2>
        <label class="radio-inline">
          <input
            type="radio"
            name="pay_options"
            id="inlineRadioq"
            value="option1"
          />
          信用卡
        </label>
        <label class="radio-inline">
          <input
            type="radio"
            name="pay_options"
            id="inlineRadio5"
            value="option2"
          />
          Apple Pay
        </label>
        <label class="radio-inline">
          <input
            type="radio"
            name="pay_options"
            id="inlineRadio6"
            value="option3"
          />
          Line Pay
        </label>
        <label class="radio-inline">
          <input
            type="radio"
            name="pay_options"
            id="inlineRadio7"
            value="option3"
          />
          貨到付款
        </label>
      </div>

      <!-- 優惠券 -->
      <!-- TODO: 取得優惠券code -->
      <div class="coupon_method">
        <h2>優惠券</h2>
        <div class="form-group">
          <label class="radio-inline">
            <input
              type="radio"
              name="coupon_options"
              id="couponRadio1"
              value="option1"
              onclick="acceptCoupon(1)"
            />
            使用
          </label>
          <label class="radio-inline">
            <input
              type="radio"
              name="coupon_options"
              id="couponRadio2"
              value="option2"
              onclick="acceptCoupon(2)"
              checked
            />
            不使用
          </label>
        </div>
        <form class="form">
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              id="couponCode"
              style="display: none"
              placeholder="請輸入優惠券代碼"
            />
          </div>
        </form>
      </div>
      <?php echo '<script'; ?>
>
        function acceptCoupon(p) {
          var coupon = document.getElementById("couponCode");
          if (p == 1) {
            coupon.style.display = "block";
          } else {
            coupon.style.display = "none";
          }
        }
      <?php echo '</script'; ?>
>

      <!-- 發票 -->
      <!-- TODO: 取得發票value, radiobutton 選擇顯示內容 -->
      <div class="receipt_method">
        <h2>發票</h2>
        <div class="form-group">
          <label class="radio-inline">
            <input
              type="radio"
              name="invoice_options"
              id="invoiceRadio1"
              value="option1"
              checked
              onclick="chooseInvoice(1)"
            />
            電子發票
          </label>
          <label class="radio-inline">
            <input
              type="radio"
              name="invoice_options"
              id="invoiceRadio2"
              value="option2"
              onclick="chooseInvoice(2)"
            />
            三聯式發票
          </label>
        </div>

        <!-- 載具 -->
        <!-- TODO: 取得載具value -->
        <div class="row">
          <div class="col-sm-12">
            <form class="form">
              <div class="checkbox" id="checkbox1">
                <label
                  ><input
                    id="Textbox1"
                    type="checkbox"
                    onclick="enabledText(1)"
                  />是否使用載具?</label
                >
              </div>
              <div class="form-group">
                <!-- <label for="carrier">載具:</label> -->
                <input
                  type="text"
                  class="form-control"
                  id="carrier"
                  placeholder="請輸入載具號碼"
                  style="display: none; white-space: nowrap"
                  disabled
                />
              </div>
            </form>
          </div>
        </div>

        <!-- 統一編號 -->
        <!-- TODO: 取得統編value -->
        <div class="row">
          <div class="col-sm-12">
            <form class="form">
              <div class="checkbox" id="checkbox2">
                <label
                  ><input
                    type="checkbox"
                    id="Textbox2"
                    onclick="enabledText(2)"
                  />
                  是否使用統一編號?</label
                >
              </div>
              <div class="form-group">
                <!-- <label for="vat">統一編號:</label> -->
                <input
                  type="text"
                  class="form-control"
                  id="vat"
                  placeholder="請輸入統一編號"
                  maxlength="8"
                  disabled
                  style="display: none; white-space: nowrap"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- 載具&統編checkbox function -->
      <?php echo '<script'; ?>
>
        function chooseInvoice(p) {
          var invoice1 = document.getElementById("checkbox1");
          var carrier = document.getElementById("carrier");
          if (p == 1) {
            invoice1.style.display = "block";
          } else {
            invoice1.style.display = "none";
            carrier.style.display = "none";
          }
        }
      <?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
>
        function enabledText(p) {
          if (p == 1) {
            var box1 = document.getElementById("Textbox1");
            var carrier = document.getElementById("carrier");
            if (box1.checked) {
              carrier.disabled = false;
              carrier.style.display = "inline-block";
            } else {
              carrier.disabled = true;
              carrier.style.display = "none";
              carrier.value = "";
            }
          } else if (p == 2) {
            var box2 = document.getElementById("Textbox2");
            var vat = document.getElementById("vat");
            if (box2.checked) {
              vat.disabled = false;
              vat.style.display = "block";
            } else {
              vat.disabled = true;
              vat.style.display = "none";
              vat.value = "";
            }
          }
        }
      <?php echo '</script'; ?>
>

      <!-- 結帳送出 -->
      <!-- TODO: 透過 .buy_content取得商品價格以及優惠券並換算成總價格 -->
      <div class="confirm_buy">
        <nav class="navbar navbar-default">
          <div class="container">
            <h4 class="navbar-text">訂單金額:</h4>
            <h4 class="navbar-text">9000</h4>
            <h4 class="navbar-text">運費:</h4>
            <h4 class="navbar-text">60</h4>
            <h4 class="navbar-text">總金額:</h4>
            <h4 class="navbar-text">9060</h4>

            <button
              type="button "
              class="btn btn-warning navbar-btn navbar-right"
            >
              結帳
            </button>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
<?php }
}