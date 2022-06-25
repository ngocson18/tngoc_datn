<?php
include './admin/page/connect.php';
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$order_id = $query['order_id'];

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM bepcuangoc.order_details WHERE order_id = '$order_id'";

$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if (!function_exists('currency_format')) {
     function currency_format($number, $suffix = ' vnđ')
     {
          if (!empty($number)) {
               return number_format($number, 0, ',', '.') . "{$suffix}";
          }
     }
}
?>
<div id="main-content-wp" class="clearfix category-product-page">
     <div class="wp-inner">
          <div class="secion" id="breadcrumb-wp">
               <div class="secion-detail">
                    <ul class="list-item clearfix">
                         <li>
                              <a href="" title="">Trang chủ > Thông tin tài khoản</a>
                         </li>
                    </ul>
               </div>
          </div>

          <div class="main-content fl-right">
               <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                         <h3 class="section-title fl-left">Chi tiết đơn hàng</h3>
                         <div class="filter-wp fl-right">
                         </div>
                    </div>
                    <table class="tb-info">
                         <tr>
                              <th>Tên sản phẩm</th>
                              <th>Sô lượng</th>
                              <th>Hình ảnh</th>
                              <th>Giá tiền</th>
                         </tr>
                         <?php
                         $sql2 = "
                             SELECT 
                                  order_details.quantity as quantity,
                                  order_details.product_id as prod_id,
                                  order_details.order_detail_id as order_detail_id,
                                  product.name as name,
                                  product.img as img,
                                  product.price as price,
                                  product.discount as discount,
                                  bepcuangoc.order.total_money as total_money,
                                  bepcuangoc.order.status as status
                             FROM bepcuangoc.order_details
                             INNER JOIN bepcuangoc.product ON order_details.product_id = product.product_id 
                             INNER JOIN bepcuangoc.order ON order_details.order_id = bepcuangoc.order.order_id 
                             WHERE order_details.order_id = $order_id
                             ";
                         $res2 = mysqli_query($conn, $sql2);
                         $count2 = mysqli_num_rows($res2);
                         while ($row2 = mysqli_fetch_assoc($res2)) {
                              $total_money = $row2['total_money'];
                              $status = $row2['status'];
                              $price = $row2['price'] - $row2['price'] * $row2['discount'] / 100;
                         ?>
                         <tr>
                              <td><?= $row2['name'] ?></td>
                              <td><?= $row2['quantity'] ?></td>
                              <td><img src="./<?= $row2['img'] ?>" alt="" class="img-acount"></td>
                              <td><?= number_format($price * $row2['quantity']) ?> đ</td>
                         </tr>
                         <?php } ?>
                    </table>
                    <br>
                    <h3 class="section-title">Giá trị đơn hàng</h3>
               </div>
               <div class="section">
                    <div class="section-detail">
                         <ul class="list-item clearfix">
                              <li>
                                   <span class="total-fee">Tổng số lượng:</span>
                                   <span class="total">Tổng đơn hàng:</span>
                              </li>
                              <li>
                                   <?php
                                   $sqlCount = "select sum(order_details.quantity) as quantityCount FROM bepcuangoc.order_details WHERE order_id = $order_id";
                                   $resCount = mysqli_query($conn, $sqlCount);
                                   while ($row2 = mysqli_fetch_assoc($resCount)) {
                                        $quantityCount = $row2['quantityCount'];
                                   ?>
                                   <span class="total-fee"><?= $quantityCount ?> sản phẩm</span>
                                   <?php } ?>
                                   <span class="total"><?= number_format($total_money) ?> đ</span>
                              </li>
                         </ul>
                    </div>
               </div>
               <div>
                    <button class="button button1"><a style="color: #fff;" href="?page=acount-order">Quay
                              lại</a></button>
                    <?php
                    if ($status == 3) {
                    ?>
                    <button class="button button2"><a style="color: #fff;">Đã hủy</a></button>
                    <?php } ?>

                    <?php
                    if ($status != 3) {
                    ?>
                    <button class="button button2"><a style="color: #fff;" onClick="cancelOrder(<?= $order_id ?>)">Hủy
                              đơn hàng</a></button>
                    <?php } ?>
               </div>
          </div>

          <?php
          require './inc/sidebar.php';
          ?>
     </div>
</div>