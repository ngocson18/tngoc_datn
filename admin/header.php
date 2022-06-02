<?php
require("page/session-user.php");
// if (isset($_SESSION['login'])) {
//      $sql2 = "SELECT * FROM user where user_phone = " . $_SESSION['login'];
//      $result2 = $conn->query($sql2);
//      $data = $result2->fetch_assoc();
//      if ($data['role_user'] == 0) {
//           echo "<script type='text/javascript'> window.location.assign('?page=list-user')</script>";
//      } else {
//           echo "<script type='text/javascript'> window.location.assign('?page=home')</script>";
//      }
// } else {
//      echo "<script type='text/javascript'> window.location.assign('?page=login')</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
     <!-- header -->
     <div id="site">
          <div id="container">
               <div id="header-wp">
                    <div class="wp-inner clearfix">
                         <a href="?page=list-user" title="" id="logo" class="fl-left">ADMIN</a>
                         <ul id="main-menu" class="fl-left">
                              <!-- <li>
                                   <a href="?page=list-role">Quyền người dùng</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="?page=add-role">Thêm quyền người dùng</a>
                                        </li>
                                        <li>
                                             <a href="?page=list-role">Danh sách quyền người dùng</a>
                                        </li>
                                   </ul>
                              </li> -->

                              <li>
                                   <a href="?page=list-user">Quản lý truy cập</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="?page=add-user">Thêm người dùng</a>
                                        </li>
                                        <li>
                                             <a href="?page=list-user">Danh sách truy cập</a>
                                        </li>
                                   </ul>
                              </li>

                              <li>
                                   <a href="?page=list-product">Quản lý món ăn</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="?page=add-product">Thêm món ăn</a>
                                        </li>
                                        <li>
                                             <a href="?page=list-product">Sửa món ăn</a>
                                        </li>
                                   </ul>
                              </li>

                              <!-- <li>
                                   <a href="?page=list-categories-product">Danh mục món ăn</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="?page=add-category">Thêm danh mục món ăn</a>
                                        </li>
                                        <li>
                                             <a href="?page=list-categories-product">Danh sách danh mục món ăn</a>
                                        </li>
                                   </ul>
                              </li> -->

                              <li>
                                   <a href="#">Đơn đặt hàng</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="?page=list-order">Danh sách đơn hàng</a>
                                        </li>
                                        <li>
                                             <a href="?page=list-user">Danh sách khách hàng</a>
                                        </li>
                                   </ul>
                              </li>

                              <!-- <li>
                                   <a href="?page=upload">Blogs</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="">Thêm Blog</a>
                                        </li>
                                        <li>
                                             <a href="">Danh sách Blogs</a>
                                        </li>
                                   </ul>
                              </li> -->

                              <li>
                                   <a href="?page=statistical">Báo cáo - thống kê</a>
                              </li>

                              <li>
                                   <a href="?page=login" onClick="<?= session_unset();
                                                                      session_destroy(); ?>" title="">Logout</a>
                              </li>
                         </ul>
                         <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                              <button class="dropdown-toggle clearfix" type="button" date-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="true">
                                   <div id="thumb-circle" class="fl-left">
                                        <img src="./images/img-admin.png" alt="" />
                                   </div>
                                   <h3 id="account" class="fl-right"><a class="text-white" style="color: #fff"
                                             id="user_name"></a></h3>
                              </button>
                              <ul class="dropdown-menu">
                              </ul>
                         </div>
                    </div>
               </div>
