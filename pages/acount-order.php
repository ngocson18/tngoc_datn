<?php
// session_start();
include './admin/page/connect.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE user_id = '$user_id'";

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
                         <h3 class="section-title fl-left">Thông tin tài khoản</h3>
                         <div class="filter-wp fl-right">
                         </div>
                    </div>
                    <div class="section-detail">

                         <form action="">
                              <?php
                              while ($row = mysqli_fetch_assoc($res)) {
                              ?>
                              <label for="fname">Tên khách hàng</label>
                              <input value="<?= $row['user_name'] ?>" class="ip-style" type="text" id="fname"
                                   name="user_name" readonly>

                              <label for="lname">Số điện thoại</label>
                              <input value="<?= $row['user_phone'] ?>" class="ip-style" type="text" id="lname"
                                   name="user_phone" readonly>

                              <label for="lname">Địa chỉ</label>
                              <input value="<?= $row['user_address'] ?>" class="ip-style" type="text" id="lname"
                                   name="user_phone" readonly>
                              <?php } ?>

                         </form>

                    </div>
                    <br>
                    <div class="section-head clearfix">
                         <h3 class="section-title fl-left">Đơn hàng đã đặt</h3>
                         <div class="filter-wp fl-right">
                         </div>
                    </div>
                    <table class="tb-info">
                         <tr>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt</th>
                              <th>Tổng tiền</th>
                              <th>Trạng thái</th>
                              <th>chi tiết đơn hàng</th>
                         </tr>
                         <?php
                         echo "<script type='text/javascript'> let a = localStorage.getItem('user_id');</script>";
                         $sql2 = "SELECT * FROM bepcuangoc.order WHERE user_id = '$user_id' ORDER BY order_id DESC";
                         $res2 = mysqli_query($conn, $sql2);
                         $count2 = mysqli_num_rows($res2);
                         while ($row2 = mysqli_fetch_assoc($res2)) {
                              switch ($row2['status']) {
                                   case 0:
                                        $statusText = 'Đã đặt hàng';
                                        break;
                                   case 1:
                                        $statusText = 'Đã xác nhận đơn hàng';
                                        break;
                                   case 2:
                                        $statusText = 'Đang giao';
                                        break;
                                   case 3:
                                        $statusText = 'Huỷ đơn';
                                        break;
                                   case 4:
                                        $statusText = 'Đơn hoàn';
                                        break;
                                   case 5:
                                        $statusText = 'Đã giao';
                                        break;
                                   default:
                                        $statusText = 'Đag xác nhận';
                              }
                         ?>
                         <tr>
                              <td><?= $row2['order_id'] ?></td>
                              <td><?= $row2['created_at'] ?></td>
                              <td><?= number_format($row2['total_money']) ?><span> đ</span></td>
                              <td><?= $statusText ?></td>
                              <td><a href="?page=acount-detail-order&order_id=<?= $row2['order_id'] ?>">Chi tiết</a>
                              </td>
                         </tr>
                         <?php } ?>
                    </table>
               </div>
          </div>

          <?php
          require './inc/sidebar.php';
          ?>
     </div>
</div>