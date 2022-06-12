<!DOCTYPE html>
<html>

<head>
     <title>BEP CUA NGOC</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     <script type="text/javascript">
     var user_exist = localStorage.getItem('user_id');
     if (user_exist === null) {
          localStorage.setItem('user_id', 0);
     }
     </script>
     <script type="text/javascript">
     function search(str) {
          if (str.length == 0) {
               document.getElementById("result").innerHTML = "";
               // document.getElementById("result").style.display = 'block';
               return;
          } else {
               var xmlhttp = new XMLHttpRequest();

               xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                         document.getElementById("result").style.display = 'block';
                         document.getElementById("result").innerHTML = xmlhttp.responseText;
                    }
               }
               xmlhttp.open("GET", "pages/live_search.php?q=" + str, true);
               xmlhttp.send();
          }
     }

     function gotoSearch() {
          let a = document.getElementById("s").value;
          window.location.href = `?page=search_product&q=${a}`;
     }

     function goCart() {
          let a = localStorage.getItem('user_id');
          window.location.href = `?page=cart&user_id=${a}`;
     }

     function thanhtoan() {
          // href="?page=checkout&user_id= $user_id"
          let allPrice = document.getElementById('allPrice').innerHTML;

          let listId = $('.prod-id');
          let listNum = $('.num-order');
          let iDArr = [];
          let numArr = [];
          [...listId].forEach(elm => {
               iDArr.push(elm.value);
          });
          [...listNum].forEach(elm2 => {
               numArr.push(elm2.value);
          });
          for (let i = 0; i < iDArr.length; i++) {
               console.log(numArr[i]);
               $.ajax({
                    url: 'pages/thanhtoan.php',
                    type: 'POST',
                    data: {
                         total_money: allPrice,
                         prod_id: iDArr[i],
                         num: numArr[i],
                         user_id: user_exist
                    },
                    success: function(result1) {
                         // console.log(result1);
                    }
               });
          }

          $.ajax({
               url: 'pages/insert_order.php',
               type: 'POST',
               data: {
                    total_money: allPrice,
                    user_id: user_exist,
                    name: "user",
                    phone: "000",
               },
               success: function(result2) {
                    orderForUpdate = result2;
                    localStorage.setItem('order_id', result2);
                    for (let i = 0; i < iDArr.length; i++) {
                         $.ajax({
                              url: 'pages/update_order_detail.php',
                              type: 'POST',
                              data: {
                                   prod_id: iDArr[i],
                                   quantity: numArr[i],
                                   user_id: user_exist,
                                   order_id: result2,
                              },
                              success: function(result3) {
                                   window.location.href =
                                        `?page=checkout&user_id=${user_exist}`;

                              }
                         })
                    }
                    var order_id = result2;
               }
          })
     }

     function confirmOK() {
          let name = document.getElementById('fullname').value;
          let phone = document.getElementById('phone').value;
          let email = document.getElementById('email').value;
          let address = document.getElementById('address').value;
          let orderId = localStorage.getItem('order_id');
          if (name !== '' && phone !== '' && email !== '' && address !== '' ) {
               $.ajax({
                    url: 'pages/giaohang.php',
                    type: 'POST',
                    data: {
                         user_id: user_exist,
                         name: name,
                         phone: phone,
                         email: email,
                         address: address,
                         order_id: orderId
                    },
                    success: function(result2) {
                         alert("Đặt hàng thành công");
                         localStorage.removeItem('order_id');
                         window.location.href = `?page=home`;
                    }
               })
          } else {
               alert("Vui lòng điền đầy đủ thông tin!");
          }
     }

     function logout() {
          localStorage.removeItem("name");
          localStorage.removeItem("user_id");
     }
     </script>
</head>

<body style="overflow-x: hidden">
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
                                        <!-- <li>
                                             <a href="?page=category_product" title="">Món ăn</a>
                                        </li> -->
                                        <li>
                                             <a href="?page=blog" title="">Blog</a>
                                        </li>
                                        <li>
                                             <a href="#" id="user_name" style="font-weight: 800">
                                             </a>
                                        </li>
                                        <li>
                                             <a id="isLogin" href="admin/?page=login" onClick="logout()" title=""></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    <div id="head-body" class="clearfix">
                         <div class="d-none" id="temp_id"></div>
                         <div class="wp-inner">
                              <a href="#" title="" id="logo" class="fl-left"><img
                                        src="./public/images/logo_BCN.png" /></a>
                              <div id="search-wp" class="fl-left">
                                   <form method="POST" action="">
                                        <input type="text" name="s" id="s" onkeyup="search(this.value)"
                                             placeholder="Nhập từ khóa tìm kiếm tại đây!" >
                                        <a type="button" onClick="gotoSearch()" id="sm-s">Tìm kiếm</a>
                                   </form>
                                   <div id="result"></div>
                              </div>

                              <div id="action-wp" class="fl-right">
                                   <div id="advisory-wp" class="fl-left">
                                        <span class="title">Liên hệ</span>
                                        <span class="phone">0968.876.944</span>
                                   </div>
                                   <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i>
                                   </div>
                                   <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <!-- <span id="num">2</span> -->
                                   </a>
                                   <div id="cart-wp" class="fl-right">
                                        <div id="btn-cart">
                                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </div>
                                        <div id="dropdown">
                                             <!-- <p class="desc">Có <span>2 sản phẩm</span> trong giỏ hàng</p> -->
                                             <ul class="list-cart" id="card-detail">
                                                  <?php
                    include './admin/page/connect.php';
                    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $parts = parse_url($url);
                    // var_dump(parse_str($parts));
                    // die();
                    if (isset($parts['query'])) {
                      parse_str($parts['query'], $query);
                      $user_id = $query['user_id'];
                    } else {
                      $user_id = 0;
                    }
                    $total = 0;
                    $sql2 = "SELECT * FROM cart WHERE user_id = '$user_id'";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);
                    if ($count2 > 0) {
                      while ($row2 = mysqli_fetch_assoc($res2)) {
                        $img = $row2['img'];
                        $name_prod_in_cart = $row2['name'];
                        $price_prod_in_cart = $row2['price'];
                        $quantity_prod_in_cart = $row2['quantity'];
                        $total = $total + $price_prod_in_cart * $quantity_prod_in_cart;
                    ?>
                                                  <li class="clearfix">
                                                       <a href="" title="" class="thumb fl-left">
                                                            <img src="<?= $img ?>" alt="">
                                                       </a>
                                                       <div class="info fl-right">
                                                            <a href="" title=""
                                                                 class="product-name"><?= $name_prod_in_cart ?></a>
                                                            <p class="price-cart"
                                                                 style="display: inline-block; color: #000">
                                                                 <?= $price_prod_in_cart ?> </p>
                                                            <span style="color: #000">đ</span>
                                                            <p class="qty">Số lượng:
                                                                 <span><?= $quantity_prod_in_cart ?></span>
                                                            </p>
                                                       </div>
                                                  </li>
                                                  <?php
                      }
                    }
                    ?>
                                             </ul>
                                             <div class="total-price d-flex flex-row">
                                                  <span class="title">Tổng:</span>
                                                  <span id="total-price" class="price"><?= $total ?> </span>
                                                  <span>đ</span>
                                             </div>
                                             <div class="action-cart clearfix">
                                                  <a id="goCart" onClick="goCart()" title="Giỏ hàng"
                                                       class="view-cart fl-left">Giỏ
                                                       hàng</a>
                                                  <a href="?page=checkout" title="Thanh toán"
                                                       class="checkout fl-right">Thanh toán</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
