<?php
include './admin/page/connect.php';
?>

<?php
$id = $_GET['user_id'];
$sql = "SELECT * FROM user WHERE user_id = '$id'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$sql2 = "SELECT * FROM cart WHERE user_id = '$id'";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);


if (!function_exists('currency_format')) {
     function currency_format($number, $suffix = ' vnđ')
     {
          if (!empty($number)) {
               return number_format($number, 0, ',', '.') . "{$suffix}";
          }
     }
}

?>
<div id="main-content-wp" class="checkout-page">
     <div class="section" id="breadcrumb-wp">
          <div class="wp-inner">
               <div class="section-detail">
                    <ul class="list-item clearfix">
                         <li>
                              <a href="?page=home" title="">Trang chủ</a>
                         </li>
                         <li>
                              <a href="" title="">Thanh toán</a>
                         </li>
                    </ul>
               </div>
          </div>
     </div>
     <!--  nếu chưa đăng nhập -->
     <form method="POST" action="" name="form-checkout">
          <div id="wrapper" class="wp-inner clearfix">
               <?php
               if ($count == 0) :
               ?>
               <div class="section" id="customer-info-wp">
                    <div class="section-head">
                         <h1 class="section-title">Thông tin khách hàng</h1>
                    </div>
                    <div class="section-detail">
                         <div class="form-row clearfix">
                              <div class="form-col fl-left">
                                   <label for="fullname">Họ tên</label>
                                   <input required type="text" name="fullname" id="fullname">
                              </div>
                              <div class="form-col fl-right">
                                   <label for="email">Email</label>
                                   <input required type="email" name="email" id="email">
                              </div>
                         </div>
                         <div class="form-row clearfix">
                              <div class="form-col fl-left">
                                   <label for="address">Địa chỉ</label>
                                   <input required type="text" name="address" id="address">
                              </div>
                              <div class="form-col fl-right">
                                   <label for="phone">Số điện thoại</label>
                                   <input required type="tel" name="phone" id="phone">
                              </div>
                         </div>
                         <div class="form-row">
                              <div class="form-col">
                                   <label for="notes">Ghi chú</label>
                                   <textarea name="note"></textarea>
                              </div>
                         </div>
                    </div>
               </div>
               <?php
               endif
               ?>
               <?php
               if ($count > 0) :
                    while ($row = mysqli_fetch_assoc($res)) {
                         $user_id = $row['user_id'];
                         $user_name = $row['user_name'];
                         $password = $row['password'];
                         $user_phone = $row['user_phone'];
                         $user_email = $row['user_email'];
                         $user_address = $row['user_address'];
                         $role_user = $row['role_user'];
                    }
               ?>
               <div class="section" id="customer-info-wp">
                    <div class="section-head">
                         <h1 class="section-title">Thông tin khách hàng</h1>
                    </div>
                    <div class="section-detail">
                         <div class="form-row clearfix">
                              <div class="form-col fl-left">
                                   <label for="fullname">Họ tên</label>
                                   <input required value="<?= $user_name ?>" type="text" name="fullname" id="fullname">
                              </div>
                              <div class="form-col fl-right">
                                   <label for="email">Email</label>
                                   <input required value="<?= $user_email ?>" type="email" name="email" id="email">
                              </div>
                         </div>
                         <div class="form-row clearfix">
                              <div class="form-col fl-left">
                                   <label for="address">Địa chỉ</label>
                                   <input required value="<?= $user_address ?>" type="text" name="address" id="address">
                              </div>
                              <div class="form-col fl-right">
                                   <label for="phone">Số điện thoại</label>
                                   <input required value="<?= $user_phone ?>" type="tel" name="phone" id="phone">
                              </div>
                         </div>
                         <div class="form-row">
                              <div class="form-col">
                                   <label for="notes">Ghi chú</label>
                                   <textarea name="note"></textarea>
                              </div>
                         </div>
                    </div>
               </div>
               <?php
               endif
               ?>
               <div class="section" id="order-review-wp">
                    <div class="section-head">
                         <h1 class="section-title">Thông tin đơn hàng</h1>
                    </div>
                    <div class="section-detail">
                         <table class="shop-table">
                              <thead>
                                   <tr>
                                        <td>Sản phẩm</td>
                                        <td>Tổng</td>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   while ($row2 = mysqli_fetch_assoc($res2)) {
                                        $name2 = $row2['name'];
                                        $price2 = $row2['price'];
                                        $quantity2 = $row2['quantity'];
                                   ?>
                                   <tr class="cart-item">
                                        <td class="product-name"><?= $name2 ?><strong class="product-quantity">x
                                                  <?= $quantity2 ?></strong>
                                        </td>
                                        <td class="product-total"><span
                                                  class="priceOneProd"><?= $price2 * $quantity2 ?></span>
                                             <span>đ</span>
                                        </td>
                                   </tr>
                                   <?php
                                   }
                                   ?>
                              </tbody>
                              <tfoot>
                                   <tr class="order-total">
                                        <td>Tổng đơn hàng:</td>
                                        <td><strong class="total-price2"></strong> đ</td>
                                   </tr>
                              </tfoot>
                         </table>
                         <div id="payment-checkout-wp">
                              <ul id="payment_methods">
                                   <li>
                                        <input checked required type="radio" id="direct-payment" name="payment-method"
                                             value="direct-payment">
                                        <label for="direct-payment">Thanh toán tại nhà.</label>
                                   </li>
                                   <!-- <li>
                                        <input  type="radio" id="payment-home" name="payment-method"
                                             value="payment-home">
                                        <label for="payment-home">Thanh toán tại nhà</label>
                                   </li> -->
                              </ul>
                         </div>
                         <div class="place-order-wp clearfix">
                              <input type="button" onClick="confirmOK()" id="order-now" value="Đặt hàng">
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>