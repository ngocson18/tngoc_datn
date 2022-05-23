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
                         <a href="?page=list-role" title="" id="logo" class="fl-left">ADMIN</a>
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

                              <li>
                                   <a href="?page=upload">Blogs</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="">Thêm Blog</a>
                                        </li>
                                        <li>
                                             <a href="">Danh sách Blogs</a>
                                        </li>
                                   </ul>
                              </li>

                              <li>
                                   <a href="?page=upload">Báo cáo - thống kê</a>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="">Báo cáo</a>
                                        </li>
                                        <li>
                                             <a href="">Thống kê hàng tuần</a>
                                        </li>
                                   </ul>
                              </li>
                         </ul>

                         <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                              <button class="dropdown-toggle clearfix" type="button" date-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="true">
                                   <div id="thumb-circle" class="fl-left">
                                        <img src="./images/img-admin.png" alt="" />
                                   </div>
                                   <h3 id="account" class="fl-right"><a href="?page=login">Admin</a></h3>
                              </button>
                              <ul class="dropdown-menu">
                                   <li>
                                        <a href="#" title="thông tin cá nhân">Thông tin tài khoản</a>
                                   </li>
                                   <li>
                                        <a href="#" title="Thoát">Thoát</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>