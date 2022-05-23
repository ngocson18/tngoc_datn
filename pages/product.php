<?php
include './admin/page/connect.php';
?>

<div class="section" id="list-product-wp">
     <div class="section-head">
          <h3 class="section-title">Đồ ăn vặt Việt Nam</h3>
     </div>
     <div class="section-detail">
          <ul class="list-item clearfix">
               <?php
                    $sql = "SELECT * FROM product WHERE category = 1 LIMIT 8";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                         while ($row = mysqli_fetch_assoc($res)) {
                              $prod_id = $row['product_id'];
                              $img = $row['img'];
                              $name = $row['name'];
                              $old_price = $row['price'];
                              $new_price = $row['price'] - $row['price']*$row['discount'] / 100;
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img ?>">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name ?></a>
                    <div class="price">
                         <span class="new"><?= $new_price ?> vnđ</span>
                         <span class="old"><?= $old_price ?> vnđ</span>
                    </div>
                    <div class="action clearfix">
                         <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ
                              hàng</a>
                         <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                    </div>
               </li>
               <?php
                    }
               }
               ?>
          </ul>
     </div>
</div>
<div class="section" id="list-product-wp">
     <div class="section-head">
          <h3 class="section-title">Đồ ăn vặt Hàn Quốc</h3>
     </div>
     <div class="section-detail">
          <ul class="list-item clearfix">
               <?php
                    $sql = "SELECT * FROM product WHERE category = 4 LIMIT 8";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                         while ($row = mysqli_fetch_assoc($res)) {
                              $prod_id = $row['product_id'];
                              $img = $row['img'];
                              $name = $row['name'];
                              $old_price = $row['price'];
                              $new_price = $row['price'] - $row['price']*$row['discount'] / 100;
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img ?>">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name ?></a>
                    <div class="price">
                         <span class="new"><?= $new_price ?> vnđ</span>
                         <span class="old"><?= $old_price ?> vnđ</span>
                    </div>
                    <div class="action clearfix">
                         <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ
                              hàng</a>
                         <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                    </div>
               </li>
               <?php
                    }
               }
               ?>
          </ul>
     </div>
</div>
