<!DOCTYPE html>
<html>

<head>
     <title>BEP CUA NGOC</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <script type="text/javascript">
          let a = localStorage.getItem('user_id');
          console.log( document.getElementById('temp_id'));
          document.getElementById('temp_id').innerHTML = a;
     </script> -->
     <link href="./public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
     <link href="./public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="./public/reset.css" rel="stylesheet" type="text/css" />
     <link href="./public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
     <link href="./public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
     <link href="./public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     <link href="./public/style.css" rel="stylesheet" type="text/css" />
     <link href="./public/responsive.css" rel="stylesheet" type="text/css" />

     <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
     <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
     <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
     <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
     <script src="public/js/main.js" type="text/javascript"></script>
     
</head>
<body>
     <div id="site">
          <div id="container">
               <div id="header-wp">
                    <div id="head-top" class="clearfix">
                         <div class="wp-inner">
                              <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                              <div id="main-menu-wp" class="fl-right">
                                   <ul id="main-menu" class="clearfix">
                                        <li>
                                             <a href="?page=home" title="">Trang chủ</a>
                                        </li>
                                        <li>
                                             <a href="?page=category_product" title="">Món ăn</a>
                                        </li>
                                        <li>
                                             <a href="?page=blog" title="">Blog</a>
                                        </li>
                                        <li>
                                             <a href="#"  id="user_name">
                                             </a>
                                        </li>
                                        <li>
                                             <a href="admin/?page=login" onClick="<?= session_unset();session_destroy(); ?>" title="">Logout</a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    <div id="head-body" class="clearfix">
                         <div class="d-none" id="temp_id"></div>
                         <div class="wp-inner">
                              <a href="?page=home" title="" id="logo" class="fl-left"><img
                                        src="./public/images/logo_BCN.png" /></a>
                              <div id="search-wp" class="fl-left">
                                   <form method="POST" action="">
                                        <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                        <button type="submit" id="sm-s">Tìm kiếm</button>
                                   </form>
                              </div>
                              
                              <div id="action-wp" class="fl-right">
                                   <div id="advisory-wp" class="fl-left">
                                        <span class="title">Liên hệ</span>
                                        <span class="phone">0987.654.321</span>
                                   </div>
                                   <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i>
                                   </div>
                                   <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">2</span>
                                   </a>
                                   <div id="cart-wp" class="fl-right">
                                        <div id="btn-cart">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                             <span id="num">2</span>
                                        </div>
                                        <div id="dropdown">
                                             <p class="desc">Có <span>2 sản phẩm</span> trong giỏ hàng</p>
                                             <ul class="list-cart" id="card-detail">
                                                  <?php
                                                       include './admin/page/connect.php';
                                                       $user_id = 53;
                                                       // $user_id = $_POST['user_id'];
                                                       $sql2 = "SELECT * FROM cart WHERE user_id = '$user_id'";
                                                       $res2 = mysqli_query($conn, $sql2);
                                                       $count2 = mysqli_num_rows($res2);
                                                       if ($count2 > 0) {
                                                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                                                 $name_prod_in_cart = $row2['name'];
                                                                 $price_prod_in_cart = $row2['price'];
                                                                 $quantity_prod_in_cart = $row2['quantity'];
                                                  ?>
                                                  <li class="clearfix">
                                                       <a href="" title="" class="thumb fl-left">
                                                            <img src="public/images/img-pro-11.png" alt="">
                                                       </a>
                                                       <div class="info fl-right">
                                                            <a href="" title="" class="product-name"><?= $name_prod_in_cart ?></a>
                                                            <p class="price"><?= $price_prod_in_cart ?> đ</p>
                                                            <p class="qty">Số lượng: <span><?= $quantity_prod_in_cart ?></span></p>
                                                       </div>
                                                  </li>
                                                  <?php
                                                            }
                                                       }
                                                  ?>
                                             </ul>
                                             <div class="total-price clearfix">
                                                  <p class="title fl-left">Tổng:</p>
                                                  <p class="price fl-right">18.500.000đ</p>
                                             </div>
                                             <div class="action-cart clearfix">
                                                  <a href="?page=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ
                                                       hàng</a>
                                                  <a href="?page=checkout" title="Thanh toán"
                                                       class="checkout fl-right">Thanh toán</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
