<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ADMIN - BEPCUANGOC</title>

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
     <script src="./js/plugins/ckeditor/ckeditor.js"></script>
     <script src="./js/main.js"></script>
</head>

<body>
     <?php
     include 'connect.php';
     // include './header.php';
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
               <div id="content" class="detail-exhibition fl-right">
                    <div class="section" id="info">
                         <div class="section-head">
                              <h3 class="section-title">Thông tin đơn hàng</h3>
                         </div>
                         <ul class="list-item">
                              <?php
                              if ($countorder > 0) {
                                   while ($roworder = mysqli_fetch_assoc($resorder)) {
                                        $name = $roworder['name'];
                                        $phone = $roworder['phone'];
                                        $address = $roworder['address'];
                                        $status = $roworder['status'];
                                        $total_money = $roworder['total_money'];

                              ?>
                              <li>
                                   <h3 class="title">Mã đơn hàng</h3>
                                   <span class="detail"><?= $order_id ?></span>
                              </li>
                              <li>
                                   <h3 class="title">Tên khách hàng</h3>
                                   <span class="detail"><?= $name ?></span>
                              </li>
                              <li>
                                   <h3 class="title">SDT khách hàng</h3>
                                   <span class="detail"><?= $phone ?></span>
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
                                             <td class="thead-text"><?= currency_format($price); ?></td>
                                             <td class="thead-text"><?= $quantity ?></td>
                                             <td class="thead-text">
                                                  <span><?= currency_format($price * $quantity); ?></span><span>
                                                  </span>
                                             </td>
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
                                        <span class="total"><?= currency_format($total_money); ?></span>
                                   </li>
                              </ul>
                         </div>
                    </div>
                    <div class="section">
                         <a href="?page=print&order_id=<?= $order_id ?>" title="" id="add-new" class="fl-left"
                              onclick="print_current_page()">In
                              hóa
                              đơn</a>
                         <a href="?page=list-order" title="" id="add-new" class="fl-left">Quay lại Admin</a>
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