<?php
include 'connect.php';
include './header.php';
?>
<?php
$sql = "SELECT * FROM bepcuangoc.order";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

$total = "SELECT * FROM bepcuangoc.order";
$dadathang = "SELECT * FROM bepcuangoc.order  WHERE status = 0";
$daxacnhan = "SELECT * FROM bepcuangoc.order  WHERE status = 1";
$danggiao = "SELECT * FROM bepcuangoc.order  WHERE status = 2";
$huydon = "SELECT * FROM bepcuangoc.order  WHERE status = 3";
$donhoan = "SELECT * FROM bepcuangoc.order  WHERE status = 4";

$restotal = mysqli_query($conn, $total);
$resdadathang = mysqli_query($conn, $dadathang);
$resdaxacnhan = mysqli_query($conn, $daxacnhan);
$resdanggiao = mysqli_query($conn, $danggiao);
$reshuydon = mysqli_query($conn, $huydon);
$resdonhoan = mysqli_query($conn, $donhoan);

$counttotal = mysqli_num_rows($restotal);
$countdadathang = mysqli_num_rows($resdadathang);
$countdaxacnhan = mysqli_num_rows($resdaxacnhan);
$countdanggiao = mysqli_num_rows($resdanggiao);
$counthuydon = mysqli_num_rows($reshuydon);
$countdonhoan = mysqli_num_rows($resdonhoan);

if (!function_exists('currency_format')) {
     function currency_format($number, $suffix = ' vnđ')
     {
          if (!empty($number)) {
               return number_format($number, 0, ',', '.') . "{$suffix}";
          }
     }
}
?>
<div id="main-content-wp" class="list-product-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>

          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 class="fl-left" id="index">Danh sách đơn hàng</h3>
                    </div>
               </div>

               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <div class="clearfix filter-wp">
                              <ul class="post-status fl-left">
                                   <li class="all"><a href="">Tất cả <span class="count">(<?= $count ?>)</span></a> |
                                   </li>
                                   <li class="publish"><a href="">Đã đặt hàng <span
                                                  class="count">(<?= $countdadathang ?>)</span></a> |
                                   </li>
                                   <li class="publish"><a href="">Đã xác nhận đơn hàng <span
                                                  class="count">(<?= $countdaxacnhan ?>)</span></a> |
                                   </li>
                                   <li class="publish"><a href="">Đang giao <span
                                                  class="count">(<?= $countdanggiao ?>)</span></a> |
                                   </li>
                                   <li class="publish"><a href="">Hủy đơn <span
                                                  class="count">(<?= $counthuydon ?>)</span></a> |
                                   </li>
                                   <li class="publish"><a href="">Đơn hoàn <span
                                                  class="count">(<?= $countdonhoan ?>)</span></a> |
                                   </li>

                              </ul>
                              <!-- <form action="" method="get" class="form-s fl-right">
                                   <input type="text" name="s" id="s">
                                   <input type="submit" name="sm_s" value="Tìm kiếm">
                              </form> -->
                         </div>
                         <div class="table-responsive">
                              <table class="table list-table-wp">
                                   <thead>
                                        <tr>
                                             <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                             <td><span class="thead-text">STT</span></td>
                                             <td><span class="thead-text">Mã đơn hàng</span></td>
                                             <td><span class="thead-text">Tên khách hàng</span></td>
                                             <td><span class="thead-text">Tổng giá</span></td>
                                             <td><span class="thead-text">Trạng thái</span></td>
                                             <td><span class="thead-text">Thời gian</span></td>
                                             <td><span class="thead-text">SDT</span></td>
                                             <td><span class="thead-text">Địa chỉ</span></td>
                                             <td><span class="thead-text">Chi tiết</span></td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $sn = 1;

                                        if ($count > 0) {
                                             while ($row = mysqli_fetch_assoc($res)) {
                                                  $order_id = $row['order_id'];
                                                  $user_id = $row['user_id'];
                                                  $status = $row['status'];
                                                  $total_money = $row['total_money'];
                                                  $created_at = $row['created_at'];
                                                  $name = $row['name'];
                                                  $phone = $row['phone'];
                                                  $email = $row['email'];
                                                  $address = $row['address'];
                                        ?>
                                        <tr>
                                             <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                             <td><span class="tbody-text"><?= $sn++ ?></span></td>
                                             <td><span class="tbody-text"><?= $order_id ?></span></td>
                                             <td><span class="tbody-text tb-title fl-left"><?= $name ?></span></td>
                                             <td><span class="tbody-text"><?= currency_format($total_money);  ?></span>
                                             </td>
                                             <td>
                                                  <span class="tbody-text">
                                                       <?php
                                                                 switch ($status) {
                                                                      case 0:
                                                                           echo 'Đã đặt hàng';
                                                                           break;
                                                                      case 1:
                                                                           echo 'Đã xác nhận đơn hàng';
                                                                           break;
                                                                      case 2:
                                                                           echo 'Đang giao';
                                                                           break;
                                                                      case 3:
                                                                           echo 'Huỷ đơn';
                                                                           break;
                                                                      case 4:
                                                                           echo 'Đơn hoàn';
                                                                           break;
                                                                      case 5:
                                                                           echo 'Đã giao';
                                                                           break;
                                                                      default:
                                                                           echo 'Đag xác nhận';
                                                                 }
                                                                 ?>
                                                  </span>
                                             </td>
                                             <td><span class="tbody-text"> <?= $created_at ?></span></td>
                                             <td><span class="tbody-text"> <?= $phone ?></span></td>
                                             <td><span class="tbody-text"> <?= $address ?></span></td>
                                             <td>
                                                  <a href="?page=detail-order&order_id=<?= $order_id ?>">Chi tiết</a>
                                             </td>
                                             <!-- <td>
                                                  <ul class="list-operation fl-left">
                                                       <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                      aria-hidden="true"></i></a></li>
                                                       <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash"
                                                                      aria-hidden="true"></i></a></li>
                                                  </ul>
                                             </td> -->
                                        </tr>
                                        <?php
                                             }
                                        }
                                        ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php
include './footer.php';
?>