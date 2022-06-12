<?php
include './admin/page/connect.php';
?>
<div class="section" id="feature-product-wp">
     <div class="section-head">
          <h3 class="section-title">Món ăn nổi bật</h3>
     </div>
     <div class="section-detail">
          <ul class="list-item">
               <?php
               $sql = "SELECT * FROM product WHERE isSpecial = 1 AND quantity != 0 ORDER BY RAND() LIMIT 4";

               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                         $prod_id = $row['product_id'];
                         $img = $row['img'];
                         $name = $row['name'];
                         $quantity = $row['quantity'];
                         $old_price = $row['price'];
                         $new_price = $row['price'] - ($row['price'] * $row['discount'] / 100);
               ?>
               <li>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                         <img src="<?= $img; ?>" style="width: 600px;height: 200px; object-fit: cover">
                    </a>
                    <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="product-name"><?= $name; ?></a>
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
                              style=" text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                              onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                              title="" class="add-cart fl-center">Thêm giỏ hàng</a>
                    </div>
               </li>
               <?php
                    }
               }
               ?>
          </ul>
     </div>
</div>