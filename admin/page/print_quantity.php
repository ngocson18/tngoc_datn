<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>In Hàng Tồn</title>
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
                              <h3 class="fl-left" id="index">Thống kê số lượng</h3>
                              <a href="?page=print_quantity" title="" id="add-new" class="fl-left"
                                   onclick="print_current_page()">In báo cáo số lượng</a>
                              <a href="?page=hangton" title="" id="add-new" class="fl-left">Quay lại</a>
                         </div>
                    </div>
                    <div class="section" id="detail-page">
                         <div class="section-detail">
                              <form action="" method="POST" enctype="multipart/form-data">
                                   <div class=""
                                        style="display: flex; flex-direction: row; justify-content: start; align-items: center">
                                        <div style="width: 500px" class="form-group">
                                             <label for="product-name">Tên món ăn</label>
                                        </div>


                                        <div style="margin-left:20px; margin-right:40px" class="form-group">
                                             <label>Hình ảnh</label>

                                        </div>

                                        <div class="">
                                             <label>SL</label>
                                        </div>
                                   </div>
                                   <?php
                                   $sql = "SELECT * FROM product";
                                   $res = mysqli_query($conn, $sql);
                                   $count = mysqli_num_rows($res);
                                   if ($count > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                             $prod_id = $row['product_id'];
                                             $img = $row['img'];
                                             $quantity = $row['quantity'];
                                             $name = $row['name'];
                                   ?>
                                   <div class=""
                                        style="display: flex; flex-direction: row; justify-content: start; align-items: center;">
                                        <div style="width: 500px" class="form-group">
                                             <input class="w-100" style="width: 100%" readonly type="text"
                                                  value="<?= $name ?>" name="name" id="product-name">
                                        </div>

                                        <div style="margin-left:20px; margin-right: 20px" class="form-group">
                                             <div id="uploadFile">
                                                  <img style="width: 80px; height: 80px" src=".<?= $img ?>" alt="" />
                                             </div>
                                        </div>

                                        <div class="">
                                             <input style="width: 100px;" readonly value="<?= $quantity ?>"
                                                  type="number" name="name" id="product-name">
                                             <?php
                                                       if ($quantity == 0) {
                                                       ?>
                                             <span style="color: red">Hết hàng</span>
                                             <?php } ?>

                                        </div>
                                   </div>
                                   <?php

                                        }
                                   }
                                   ?>
                              </form>
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