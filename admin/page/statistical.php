<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Trang Quản Lý</title>

     <!-- <link rel="stylesheet" href="./css/style.css"> -->
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
     </script>
     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
</head>
<?php
include './header.php';
include 'connect.php';
?>

<body class="sb-nav-fixed">
     <div id="layoutSidenav">
          <div id="layoutSidenav_content">
               <main>
                    <div class="container-fluid">
                         <h1 class="mt-4">Thống kê doanh thu</h1>
                         <ol class="breadcrumb mb-4">
                              <li class="breadcrumb-item active">Thống kê doanh thu theo ngày / tháng / nam </li>
                         </ol>
                         <div class="row">
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Doanh thu ngày <?= date("d-m-Y"); ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">

                                             <?php
                                             $sql = "SELECT SUM(order.total_money) as tongtien FROM bepcuangoc.order WHERE DAY(`created_at`) = DAY(CURDATE()) AND  MONTH(`created_at`) = MONTH(CURDATE()) AND status = 5";
                                             $result = mysqli_query($conn, $sql);
                                             $data = mysqli_fetch_assoc($result);
                                             $ngay = number_format($data['tongtien']);
                                             echo '<a class="small text-white stretched-link" href="#">' . $ngay . ' d </a>';
                                             ?>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-warning text-white mb-4">
                                        <div class="card-body"> Doanh thu Tháng <?= date("m-Y"); ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                             <?php
                                             $sql2 = "SELECT SUM(order.total_money) as tongtien FROM bepcuangoc.order WHERE MONTH(`created_at`) = MONTH(CURDATE()) AND status = 5";
                                             $result2 = mysqli_query($conn, $sql2);
                                             $data2 = mysqli_fetch_assoc($result2);
                                             $thang = number_format($data2['tongtien']);
                                             echo '<a class="small text-white stretched-link" href="#">' . $thang . ' d </a>';

                                             ?>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Doanh thu Năm <?= date("Y"); ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                             <?php
                                             $sql3 = "SELECT SUM(order.total_money) as tongtien FROM bepcuangoc.order WHERE YEAR(`created_at`) = YEAR(CURDATE()) AND status = 5";
                                             $result3 = mysqli_query($conn, $sql3);
                                             $data3 = mysqli_fetch_assoc($result3);
                                             $nam = number_format($data3['tongtien']);
                                             echo '<a class="small text-white stretched-link" href="#">' . $nam . ' d </a>';
                                             ?>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Tổng Doanh thu:</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                             <?php
                                             $sql4 = "SELECT SUM(order.total_money) as tongtien FROM bepcuangoc.order WHERE status = 5";
                                             $result4 = mysqli_query($conn, $sql4);
                                             $data4 = mysqli_fetch_assoc($result4);
                                             $nam = number_format($data4['tongtien']);
                                             echo '<a class="small text-white stretched-link" href="#">' . $nam . ' d </a>';
                                             ?>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <!-- <div style="display: flex; flex-direction: row; justify-content: space-between"> -->
                         <input onChange="changeDay(this.value)" type="date" id="choose" name="choose">
                         <br />
                         <!-- </div> -->
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
                                        <a style="float: left" href="?page=hangton" id="add-new" class="fl-right">Kiểm
                                             tra SL hàng</a>

                                   </div>
                              </div>
                         </div>
                         <div class="card mb-4 m-3">
                              <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê năm :
                                   <input id="click" type="number" placeholder="YYYY" min="2017" max="2100"
                                        value="<?= date("Y"); ?>">
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                             <thead>
                                                  <tr>
                                                       <th>Tháng</th>
                                                       <th>Doanh thu</th>
                                                       <th style="max-width: 100px;">Tổng lượng doanh thu theo năm
                                                            <?= date("Y"); ?></th>
                                                  </tr>
                                             </thead>
                                             <tbody id="data">Thống kê năm
                                                  <?php for ($i = 1; $i < (int)date("m") + 1; $i++) { ?>
                                                  <tr>
                                                       <th>Tháng <?= $i ?></th>
                                                       <?php
                                                            $sql5 = "SELECT SUM(order.total_money) as tongtien FROM bepcuangoc.order WHERE status = 5  and MONTH(`created_at`) = $i and Year(`created_at`) = 2022";
                                                            $result5 = mysqli_query($conn, $sql5);
                                                            $data5 = mysqli_fetch_assoc($result5);
                                                            $thang_all = number_format($data5['tongtien']);
                                                            $tile = 0;
                                                            // if($data3['tongtien'] != 0) {
                                                            $tile = ($data5['tongtien'] / $data3['tongtien']) * 100;
                                                            // }
                                                            ?>
                                                       <th><?= $thang_all ?> d</th>

                                                       <th><?= round($tile, 2) ?>%</th>
                                                  </tr>
                                                  <?php } ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>

                         <div class="card mb-4 m-3">
                              <div class="card-header"><i class="fas fa-table mr-1"></i>Thống theo người dùng theo
                                   tháng/ năm
                                   <?= date("Y"); ?>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                             <thead>
                                                  <tr>
                                                       <th>ID</th>
                                                       <th>Tên Admin</th>
                                                       <th>Tháng 1</th>
                                                       <th>Tháng 2</th>
                                                       <th>Tháng 3</th>
                                                       <th>Tháng 4</th>
                                                       <th>Tháng 5</th>
                                                       <th>Tháng 6</th>
                                                       <th>Tháng 7</th>
                                                       <th>Tháng 8</th>
                                                       <th>Tháng 9</th>
                                                       <th>Tháng 10</th>
                                                       <th>Tháng 11</th>
                                                       <th>Tháng 12</th>
                                                  </tr>
                                             </thead>
                                             <tbody>

                                                  <?php
                                                  $sql6 = "SELECT SUM(order.total_money) as tongtien ,user.user_id,user.user_name,user.user_phone FROM bepcuangoc.order,user WHERE status = 5 AND user.user_id = order.user_id  GROUP BY order.user_id";
                                                  $result6 = mysqli_query($conn, $sql6);
                                                  ?>
                                                  <?php foreach ($result6 as $key => $value) : ?>
                                                  <?php $tile = ($value['tongtien'] / $data4['tongtien']) * 100; ?>
                                                  <tr>

                                                       <th><?= $value['user_id'] ?></th>
                                                       <th><?= $value['user_name'] ?></th>
                                                       <?php for ($i = 1; $i < 13; $i++) {
                                                                 $sql7 = "SELECT SUM(bepcuangoc.order.total_money) as tongtien ,bepcuangoc.user.user_id, bepcuangoc.user.user_name,bepcuangoc.user.user_phone FROM bepcuangoc.order, bepcuangoc.user WHERE status = 5 AND bepcuangoc.user.user_id = bepcuangoc.order.user_id and Year(`created_at`) = 2022  and MONTH(`created_at`) = $i AND bepcuangoc.user.user_id= $value[user_id] GROUP BY bepcuangoc.order.user_id ";
                                                                 $result7 = mysqli_query($conn, $sql7);
                                                                 $data7 = mysqli_fetch_assoc($result7);
                                                                 if ($data7 != null && $data3 != null) {
                                                                      $temp =  ($data7['tongtien'] / $data3['tongtien']) * 100;
                                                                      $temp2 = round($temp, 2);
                                                                      if ($data7 != NULL) {
                                                                           echo "<td> $temp2 %</td>";
                                                                      }
                                                                 } else {
                                                                      echo "<td></td>";
                                                                 }
                                                            } ?>
                                                  </tr>
                                                  <?php endforeach ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </main>

          </div>
     </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
<script type="text/javascript">
$(document).ready(function() {
     $('#click').change(function() {
          var value = $("#click").val();
          console.log(value);
          $.ajax({
               url: 'page/ajax_admin_thongkenam.php',
               method: 'POST',
               dataType: 'html',
               data: {
                    value: value,
               }
          }).done(function(ketqua) {
               console.log(ketqua);
               $("#data").html(ketqua);
          });
     })
});
</script>
<?php include './footer.php'; ?>

</html>