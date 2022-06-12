<?php
include './admin/page/connect.php';
?>

<div class="sidebar fl-left">
     <div class="section" id="selling-wp">
          <div>
               <div class="section" id="category-product-wp">
                    <div class="section-head">
                         <h3 class="section-title">Danh mục món ăn</h3>
                    </div>
                    <div class="secion-detail">
                         <ul class="list-item">
                              <?php
                              $sql = "SELECT * FROM category WHERE parent = 0";

                              $res = mysqli_query($conn, $sql);

                              $count = mysqli_num_rows($res);
                              if ($count > 0) {
                                   while ($row = mysqli_fetch_assoc($res)) {
                                        $cate_id = $row['category_id'];
                                        $cate_name = $row['category_name'];
                                        $parent = $row['parent'];
                              ?>
                              <li>
                                   <a href="?page=category_product&cate_id=<?= $cate_id ?>&paging=1"
                                        title=""><?= $cate_name ?></a>
                                   <?php
                                             if ($parent == $cate_id) {
                                             ?>
                                   <ul class="sub-menu">
                                        <li>
                                             <a href="?page=category_product" title="">Bánh tráng trộn</a>
                                             <ul class="sub-menu">
                                                  <li>
                                                       <a href="?page=category_product" title="">Bánh tráng trộn đặc
                                                            biệt</a>
                                                  </li>
                                                  <li>
                                                       <a href="?page=category_product" title="">Bánh tráng trộn
                                                            chay</a>
                                                  </li>
                                                  <li>
                                                       <a href="?page=category_product" title="">Bánh tráng trộn bơ
                                                            sữa</a>
                                                  </li>
                                             </ul>
                                        </li>
                                   </ul>
                                   <?php
                                             }
                                             ?>
                              </li>
                              <?php
                                   }
                              }
                              ?>
                         </ul>
                    </div>
               </div>
          </div>

          <div>
               <div class="section-head">
                    <h3 class="section-title">Gợi ý tuần mới</h3>
               </div>
               <div class="section-detail">
                    <ul class="list-item">
                         <?php
                         $sql = "SELECT * FROM product WHERE quantity > 0 ORDER BY RAND() LIMIT 2";

                         $res = mysqli_query($conn, $sql);

                         $count = mysqli_num_rows($res);
                         if ($count > 0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                                   $prod_id = $row['product_id'];
                                   $img = $row['img'];
                                   $name = $row['name'];
                                   $old_price = $row['price'];
                                   $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
                         ?>
                         <li class="clearfix">
                              <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb fl-left">
                                   <img src="<?= $img ?>" style="width: 600px;height: 100px; object-fit: cover">
                              </a>
                              <div class="info fl-right">
                                   <a href="?page=detail_product&id=<?= $prod_id ?>" title=""
                                        class="product-name"><?= $name; ?></a>
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
                                   <!-- <a href="" title="" class="buy-now">Mua ngay</a> -->
                                   <a href="?page=detail_product&id=<?= $prod_id ?>" title=""
                                        class="product-name">Mua ngay</a>
                              </div>
                         </li>
                         <?php
                              }
                         }
                         ?>
                    </ul>
               </div>
          </div>
     </div>
     <div>
          <div class="section" id="banner-wp">
               <div class="section" id="slider-wp">
                    <div class="section-detail">
                         <div class="section-detail">
                              <a href="" title="" class="thumb">
                                   <img src="./public/images/banner-sidebar4.jpg" alt="" style="border-radius: 5px;">
                              </a>
                              <a href="" title="" class="thumb">
                                   <img src="./public/images/banner-sidebar.jpg" alt="" style="border-radius: 5px;">
                              </a>
                              <a href="" title="" class="thumb">
                                   <img src="./public/images/banner-sidebar3.jpg" alt="" style="border-radius: 5px;">
                              </a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
