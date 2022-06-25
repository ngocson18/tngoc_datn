<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>In thống kê Đơn hàng trong ngày</title>
     <link rel="stylesheet" href="./lib/bootstrap/bootstrap.min.css" />
     <link rel="stylesheet" href="./lib/bootstrap/bootstrap-theme.min.css" />
     <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css" />
     <link rel="stylesheet" href="./css/reset.css" />
     <link rel="stylesheet" href="./css/responsive.css" />
     <!-- Import -->
     <link rel="stylesheet" href="./css/add_cat.css" />
     <link rel="stylesheet" href="./css/change_pass.css" />
     <link rel="stylesheet" href="./css/detail_order.css" />
     <link rel="stylesheet" href="./css/fonts.css" />
     <link rel="stylesheet" href="./css/info_account.css" />
     <link rel="stylesheet" href="./css/list_post.css" />
     <link rel="stylesheet" href="./css/list_product.css" />
     <link rel="stylesheet" href="./css/global.css" />
     <link rel="stylesheet" href="./css/menu.css" />
     <link rel="stylesheet" href="./css/sidebar.css" />
     <!-- script -->
     <script src="./js/bootstrap/bootstrap.min.js"></script>
     <script src="./js/jquery-2.2.4.min.js"></script>
</head>
<?php
include 'connect.php';
// include './header.php';
?>
<?php
$currentDay = date('Y-m-d');
// var_dump($currentDay);
// die();
$sql = "SELECT * FROM bepcuangoc.order WHERE created_at = '$currentDay'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
// var_dump($count);
// die();

$total = "SELECT * FROM bepcuangoc.order";
$dadathang = "SELECT * FROM bepcuangoc.order WHERE status = 0";
$daxacnhan = "SELECT * FROM bepcuangoc.order WHERE status = 1";
$danggiao = "SELECT * FROM bepcuangoc.order WHERE status = 2";
$huydon = "SELECT * FROM bepcuangoc.order WHERE status = 3";
$donhoan = "SELECT * FROM bepcuangoc.order WHERE status = 4";
$dagiao = "SELECT * FROM bepcuangoc.order WHERE status = 5";

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

// var_dump($resultTongSoDon);
// die();



if (!function_exists('currency_format')) {
     function currency_format($number, $suffix = ' vnđ')
     {
          if (!empty($number)) {
               return number_format($number, 0, ',', '.') . "{$suffix}";
          }
     }
}
?>

<body>
     <?php
     include 'connect.php';
     // include './header.php';
     ?>
     <div id="main-content-wp" class="add-cat-page">
          <div class="wrap clearfix">
               <div id="content" class="fl-right">
                    <div class="section" id="title-page">
                         <div class="clearfix">
                              <h3 class="fl-left" id="index">Thống kê Đơn hàng trong ngày</h3>
                              <a href="?page=print-order-in-day" title="" id="add-new" class="fl-left"
                                   onclick="print_current_page()">In báo cáo</a>
                              <a href="?page=statistical" title="" id="add-new" class="fl-left">Quay lại</a>
                         </div>
                    </div>
                    <div class="card mb-4 mt-3">
                         <div class="card-body">
                              <div id="result-area" class="table-responsive">
                                   <?php
                                   $time = date('Y/m/d');
                                   $sqlSoDonDaGiao = "SELECT COUNT(order_id) as sodondagiao FROM bepcuangoc.order WHERE created_at = '$time' AND status = 5";
                                   $resultSoDonDaGiao = mysqli_query($conn, $sqlSoDonDaGiao);
                                   foreach ($resultSoDonDaGiao as $key => $value) :
                                        echo '<span>Số đơn hàng đã giao:</span>';
                                        echo '<span class="ml-3">' . $value['sodondagiao'] . ' Đơn</span> <br />';
                                   endforeach;
                                   ?>
                                   <?php
                                   $time = date('Y/m/d');
                                   $sqlSoDonHoan = "SELECT COUNT(order_id) as sodonhoan FROM bepcuangoc.order WHERE created_at = '$time' AND status = 4";
                                   $resultSoDonHoan = mysqli_query($conn, $sqlSoDonHoan);
                                   foreach ($resultSoDonHoan as $key => $value) :
                                        echo '<span>Số đơn hoàn:</span>';
                                        echo '<span class="ml-3">' . $value['sodonhoan'] . ' Đơn</span> <br />';
                                   endforeach;
                                   ?>

                                   <?php
                                   $time = date('Y/m/d');
                                   $sqlSoDonHuy = "SELECT COUNT(order_id) as sodonhuy FROM bepcuangoc.order WHERE created_at = '$time' AND status = 3";
                                   $resultSoDonHuy = mysqli_query($conn, $sqlSoDonHuy);
                                   foreach ($resultSoDonHuy as $key => $value) :
                                        echo '<span>Số đơn hủy:</span>';
                                        echo '<span class="ml-3">' . $value['sodonhuy'] . ' Đơn</span> <br />';
                                   endforeach;
                                   ?>

                                   <?php
                                   $time = date('Y/m/d');
                                   $sqlSoDonDangGiao = "SELECT COUNT(order_id) as sodondanggiao FROM bepcuangoc.order WHERE created_at = '$time' AND status = 2";
                                   $resultSoDonDangGiao = mysqli_query($conn, $sqlSoDonDangGiao);
                                   foreach ($resultSoDonDangGiao as $key => $value) :
                                        echo '<span>Số đơn hàng đang giao:</span>';
                                        echo '<span class="ml-3">' . $value['sodondanggiao'] . ' Đơn</span> <br />';
                                   endforeach;
                                   ?>

                                   <?php
                                   $time = date('Y/m/d');
                                   $sqlSoDonDaXacNhan = "SELECT COUNT(order_id) as sodondaxacnhan FROM bepcuangoc.order WHERE created_at = '$time' AND status = 1";
                                   $resultSoDonDaXacNhan = mysqli_query($conn, $sqlSoDonDaXacNhan);
                                   foreach ($resultSoDonDaXacNhan as $key => $value) :
                                        echo '<span>Số đơn hàng đã xác nhận:</span>';
                                        echo '<span class="ml-3">' . $value['sodondaxacnhan'] . ' Đơn</span> <br />';
                                   endforeach;
                                   ?>

                                   <?php
                                   $time = date('Y/m/d');
                                   $sqlSoDonMoi = "SELECT COUNT(order_id) as sodonmoi FROM bepcuangoc.order WHERE created_at = '$time' AND status = 0";
                                   $resultSoDonMoi = mysqli_query($conn, $sqlSoDonMoi);
                                   foreach ($resultSoDonMoi as $key => $value) :
                                        echo '<span>Số đơn hàng mới:</span>';
                                        echo '<span class="ml-3">' . $value['sodonmoi'] . ' Đơn</span> <br />';
                                   endforeach;
                                   ?>
                              </div>
                         </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                         <h1>Đơn hàng trong ngày : <?= date("d-m-Y"); ?></h1>
                         <div>
                              <?php
                              $tongSoDon = "SELECT COUNT(order_id) as tongsodon FROM bepcuangoc.order WHERE created_at = '$currentDay'";
                              $resultTongSoDon = mysqli_query($conn, $tongSoDon);
                              foreach ($resultTongSoDon as $key => $value) :
                                   echo '<span>Tổng số đơn: </span>';
                                   echo '<span class="ml-3">' . $value['tongsodon'] . ' Đơn</span> <br />';
                              endforeach;
                              ?>
                         </div>
                         <table class="table list-table-wp">
                              <thead>
                                   <tr>
                                        <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Mã đơn hàng</span></td>
                                        <td><span class="thead-text">Tên khách hàng</span></td>
                                        <td><span class="thead-text">Tổng giá</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td><span class="thead-text">SDT</span></td>
                                        <td><span class="thead-text">Địa chỉ</span></td>
                                        <!-- <td><span class="thead-text">Chi tiết</span></td> -->
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
                                        <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
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
                                        <!-- <td>
                                             <a href="?page=detail-order&order_id=<?= $order_id ?>">Chi tiết</a>
                                        </td> -->
                                   </tr>
                                   <?php
                                        }
                                   }
                                   ?>
                              </tbody>
                         </table>
                    </div>
                    <br>
                    <div class="section">
                         <?php
                         $sqltotalDay = "SELECT SUM(order.total_money) as tongtien FROM bepcuangoc.order WHERE DAY(`created_at`) = DAY(CURDATE()) AND  MONTH(`created_at`) = MONTH(CURDATE()) AND status = 5";
                         $result = mysqli_query($conn, $sqltotalDay);
                         $data = mysqli_fetch_assoc($result);
                         $ngay = number_format($data['tongtien']);
                         ?>
                         <div class="section-detail">
                              <ul class="list-item clearfix">
                                   <li>
                                        <span class="total-fee">Tổng số lượng: </span>
                                        <span class="total"> <?= $count ?> Đơn hàng</span>
                                   </li>
                                   <li>
                                        <span class="total-fee" style="font-size: 18px;">Tổng doanh thu ngày (Đơn đã
                                             giao): </span>
                                        <span class="total" style="font-size: 18px;"><strong><?= $ngay; ?>
                                                  vnđ</strong></span>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>

</html>
<script>
function print_current_page() {
     window.print();
}
</script>