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
               $sql = "SELECT * FROM product WHERE category = 1 ORDER BY RAND() LIMIT 8";
               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                         $prod_id = $row['product_id'];
                         $img = $row['img'];
                         $quantity = $row['quantity'];
                         $name = $row['name'];
                         $old_price = $row['price'];
                         $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img ?>" style="width: 600px;height: 200px; object-fit: cover">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name ?></a>
                    <div class="price">
                         <?php
                                   if (!function_exists('currency_format')) {
                                        function currency_format($number, $suffix = ' vnđ')
                                        {
                                             if (!empty($number)) {
                                                  return number_format($number, 0, ',', '.') . "{$suffix}";
                                             }
                                        }
                                   }
                                   ?>
                         <span class="new"><?= currency_format($new_price); ?></span>
                         <span class="old"><?= currency_format($old_price); ?></span>
                    </div>
                    <div class="action clearfix">
                         <a type="button"
                              style="text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                              onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                              title="Thêm giỏ hàng" class="add-cart fl-center">Thêm giỏ
                              hàng</a>
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
               $sql = "SELECT * FROM product WHERE category = 2 ORDER BY RAND() LIMIT 8";
               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                         $prod_id = $row['product_id'];
                         $img = $row['img'];
                         $quantity = $row['quantity'];
                         $name = $row['name'];
                         $old_price = $row['price'];
                         $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img ?>" style="width: 600px;height: 200px; object-fit: cover">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name ?></a>
                    <div class="price">
                         <?php
                                   if (!function_exists('currency_format')) {
                                        function currency_format($number, $suffix = ' vnđ')
                                        {
                                             if (!empty($number)) {
                                                  return number_format($number, 0, ',', '.') . "{$suffix}";
                                             }
                                        }
                                   }
                                   ?>
                         <span class="new"><?= currency_format($new_price); ?></span>
                         <span class="old"><?= currency_format($old_price); ?></span>
                    </div>
                    <div class="action clearfix">
                         <a type="button"
                              style="text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                              onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                              title="Thêm giỏ hàng" class="add-cart fl-center">Thêm giỏ
                              hàng</a>
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
          <h3 class="section-title">Đồ ăn vặt Thái lan</h3>
     </div>
     <div class="section-detail">
          <ul class="list-item clearfix">
               <?php
               $sql = "SELECT * FROM product WHERE category = 3 ORDER BY RAND() LIMIT 8";
               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                         $prod_id = $row['product_id'];
                         $img = $row['img'];
                         $quantity = $row['quantity'];
                         $name = $row['name'];
                         $old_price = $row['price'];
                         $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img ?>" style="width: 600px;height: 200px; object-fit: cover">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name ?></a>
                    <div class="price">
                         <?php
                                   if (!function_exists('currency_format')) {
                                        function currency_format($number, $suffix = ' vnđ')
                                        {
                                             if (!empty($number)) {
                                                  return number_format($number, 0, ',', '.') . "{$suffix}";
                                             }
                                        }
                                   }
                                   ?>
                         <span class="new"><?= currency_format($new_price); ?></span>
                         <span class="old"><?= currency_format($old_price); ?></span>
                    </div>
                    <div class="action clearfix">
                         <a type="button"
                              style="text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                              onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                              title="Thêm giỏ hàng" class="add-cart fl-center">Thêm giỏ
                              hàng</a>
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
          <h3 class="section-title">Đồ ăn vặt khác</h3>
     </div>
     <div class="section-detail">
          <ul class="list-item clearfix">
               <?php
               $sql = "SELECT * FROM product WHERE category = 4 ORDER BY RAND() LIMIT 8";
               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                         $prod_id = $row['product_id'];
                         $img = $row['img'];
                         $quantity = $row['quantity'];
                         $name = $row['name'];
                         $old_price = $row['price'];
                         $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img ?>" style="width: 600px;height: 200px; object-fit: cover">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name ?></a>
                    <div class="price">
                         <?php
                                   if (!function_exists('currency_format')) {
                                        function currency_format($number, $suffix = ' vnđ')
                                        {
                                             if (!empty($number)) {
                                                  return number_format($number, 0, ',', '.') . "{$suffix}";
                                             }
                                        }
                                   }
                                   ?>
                         <span class="new"><?= currency_format($new_price); ?></span>
                         <span class="old"><?= currency_format($old_price); ?></span>
                    </div>
                    <div class="action clearfix">
                         <a type="button"
                              style="text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                              onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                              title="Thêm giỏ hàng" class="add-cart fl-center">Thêm giỏ
                              hàng</a>
                    </div>
               </li>
               <?php
                    }
               }
               ?>
          </ul>
     </div>
</div>