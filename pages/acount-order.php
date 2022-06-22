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
                         <h3 class="section-title fl-left">Thông tin tài khoản</h3>
                         <div class="filter-wp fl-right">
                         </div>
                    </div>
                    <div class="section-detail">

                         <form action="">
                              <label for="fname">Tên khách hàng</label>
                              <input class="ip-style" type="text" id="fname" name="user_name" readonly>

                              <label for="lname">Số điện thoại</label>
                              <input class="ip-style" type="text" id="lname" name="user_phone" readonly>

                              <label for="lname">Địa chỉ</label>
                              <input class="ip-style" type="text" id="lname" name="user_phone" readonly>

                         </form>

                    </div>
                    <br>
                    <div class="section-head clearfix">
                         <h3 class="section-title fl-left">Đơn hàng đã đặt</h3>
                         <div class="filter-wp fl-right">
                         </div>
                    </div>
                    <table>
                         <tr>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt</th>
                              <th>Sô lượng</th>
                              <th>chi tiết đơn hàng</th>
                         </tr>
                         <tr>
                              <td>100</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><a href="?page=acount-detail-order">Chi tiết</a></td>
                         </tr>
                         <tr>
                              <td>100</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><a href="?page=acount-detail-order">Chi tiết</a></td>

                         </tr>
                         <tr>
                              <td>100</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><a href="?page=acount-detail-order">Chi tiết</a></td>

                         </tr>
                         <tr>
                              <td>100</td>
                              <td>22-06-2022</td>
                              <td>15</td>
                              <td><a href="?page=acount-detail-order">Chi tiết</a></td>

                         </tr>
                    </table>
               </div>
          </div>

          <?php
          require './inc/sidebar.php';
          ?>
     </div>
</div>