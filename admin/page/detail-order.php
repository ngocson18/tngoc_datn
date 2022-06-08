<?php 
     include 'connect.php';
     include './header.php';
     $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     $parts = parse_url($url);
     parse_str($parts['query'], $query);
     $order_id = $query['order_id'];

     $sql = "
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
     $res = mysqli_query($conn, $sql);
     $count = mysqli_num_rows($res);

     $sqlectorder = "SELECT * FROM bepcuangoc.order WHERE order_id = $order_id";
     $resorder = mysqli_query($conn, $sqlectorder);
     $countorder = mysqli_num_rows($resorder);

     
?>
<div id="main-content-wp" class="list-product-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>
          <div id="content" class="detail-exhibition fl-right">
               <div class="section" id="info">
                    <div class="section-head">
                         <h3 class="section-title">Thông tin đơn hàng</h3>
                    </div>
                    <ul class="list-item">
                         <?php
                              if ($countorder > 0) {
                                   while ($roworder = mysqli_fetch_assoc($resorder)) {
                                        $address = $roworder['address'];
                                        $status = $roworder['status'];
                                        $total_money = $roworder['total_money'];
                                   
                         ?>
                         <li>
                              <h3 class="title">Mã đơn hàng</h3>
                              <span class="detail"><?= $order_id ?></span>
                         </li>
                         <li>
                              <h3 class="title">Địa chỉ nhận hàng</h3>
                              <span class="detail"><?= $address ?></span>
                         </li>
                         <li>
                              <h3 class="title">Thông tin vận chuyển</h3>
                              <span class="detail">Thanh toán tại nhà</span>
                         </li>
                         <?php
                              }
                         }
                         ?>
                         <form method="POST" action="">
                              <li>
                                   <h3 class="title">Tình trạng đơn hàng</h3>
                                   <select onChange="changeStatus(this.value, <?= $order_id ?>)"  name="status">
                                        <option value=''>Chọn</option>
                                        <option value='0' <?= $status == 0 ? ' selected' : '' ?>>Đã đặt hàng</option>
                                        <option value='1' <?= $status == 1 ? ' selected' : '' ?>>Đã xác nhận đơn hàng</option>
                                        <option value='2' <?= $status == 2 ? ' selected' : '' ?>>Đang giao</option>
                                        <option value='3' <?= $status == 3 ? ' selected' : '' ?>>Huỷ đơn</option>
                                        <option value='4' <?= $status == 4 ? ' selected' : '' ?>>Đơn hoàn</option>
                                   </select>
                              </li>
                         </form>
                    </ul>
               </div>
               <div class="section">
                    <div class="section-head">
                         <h3 class="section-title">Sản phẩm đơn hàng</h3>
                    </div>
                    <div class="table-responsive">
                         <table class="table info-exhibition">
                              <thead>
                                  
                                   <tr>
                                        <td class="thead-text">STT</td>
                                        <td class="thead-text">Ảnh sản phẩm</td>
                                        <td class="thead-text">Tên sản phẩm</td>
                                        <td class="thead-text">Đơn giá</td>
                                        <td class="thead-text">Số lượng</td>
                                        <td class="thead-text">Thành tiền</td>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php 
                                   if ($count > 0) {
                                        $sn = 1;
                                        while ($row = mysqli_fetch_assoc($res)) {
                                             $main_img = $row['img'];
                                             $name = $row['name'];
                                             $price = $row['price'] - $row['price'] * $row['discount'] / 100;
                                             $quantity = $row['quantity'];
                                             $total_money = $row['total_money'];
                                   ?>
                                   <tr>
                                        <td class="thead-text"><?= $sn++ ?></td>
                                        <td class="thead-text">
                                             <div class="thumb">
                                                  <img src=".<?= $main_img ?>" alt="">
                                             </div>
                                        </td>
                                        <td class="thead-text"><?= $name ?></td>
                                        <td class="thead-text"><?= $price ?></td>
                                        <td class="thead-text"><?= $quantity ?></td>
                                        <td class="thead-text"><span><?= $price * $quantity ?></span><span> đ</span></td>
                                   </tr>
                                   <?php
                                        }
                                   }
                                   ?>
                              </tbody>
                         </table>
                    </div>
               </div>
               <div class="section">
                    <h3 class="section-title">Giá trị đơn hàng</h3>
                    <div class="section-detail">
                         <ul class="list-item clearfix">
                              <li>
                                   <span class="total-fee">Tổng số lượng</span>
                                   <span class="total">Tổng đơn hàng</span>
                              </li>
                              <li>
                                   <span class="total-fee"><?= $count ?> sản phẩm</span>
                                   <span class="total"><?= $total_money ?></span>
                              </li>
                         </ul>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php 
     include './footer.php';
?>
