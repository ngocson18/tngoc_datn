<?php
include './admin/page/connect.php';

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
                    <table>
                         <tr>
                              <th>Mã đơn hàng</th>
                              <th>Tên sản phẩm</th>
                              <th>Ngày đặt</th>
                              <th>Sô lượng</th>
                              <th>Hình ảnh</th>
                              <th>Giá tiền</th>
                         </tr>
                         <tr>
                              <td>100</td>
                              <td>Sữa chua</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><img src="./public/images/Food_img/cake-main-1.jpg" alt="" class="img-acount"></td>
                              <td>100.000 vnđ</td>
                         </tr>
                         <tr>
                              <td>100</td>
                              <td>Sữa chua</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><img src="./public/images/Food_img/cake-main-1.jpg" alt="" class="img-acount"></td>
                              <td>100.000 vnđ</td>

                         </tr>
                         <tr>
                              <td>100</td>
                              <td>Sữa chua</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><img src="./public/images/Food_img/cake-main-1.jpg" alt="" class="img-acount"></td>
                              <td>100.000 vnđ</td>

                         </tr>
                         <tr>
                              <td>100</td>
                              <td>Sữa chua</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><img src="./public/images/Food_img/cake-main-1.jpg" alt="" class="img-acount"></td>
                              <td>100.000 vnđ</td>
                         </tr>
                    </table>
                    <br>
                    <h3 class="section-title">Giá trị đơn hàng</h3>
               </div>
               <div class="section">
                    <div class="section-detail">
                         <ul class="list-item clearfix">
                              <li>
                                   <span class="total-fee">Tình trạng đơn hàng:</span>
                                   <span class="total-fee">Tổng số lượng:</span>
                                   <span class="total">Tổng đơn hàng:</span>
                              </li>
                              <li>
                                   <span class="total-fee">Đang giao</span>
                                   <span class="total-fee">100 sản phẩm</span>
                                   <span class="total">100.000</span>
                              </li>
                         </ul>
                    </div>
               </div>
               <div>
                    <button class="button button1"><a style="color: #fff;" href="?page=acount-order">Quay
                              lại</a></button>
                    <button class="button button2"><a style="color: #fff;" href="">Hủy đơn hàng</a></button>
               </div>
          </div>

          <?php
          require './inc/sidebar.php';
          ?>
     </div>
</div>