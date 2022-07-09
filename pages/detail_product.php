<?php
include './admin/page/connect.php';
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$prod_id_from_url = $query['id'];

$sql = "SELECT * FROM product WHERE product_id = $prod_id_from_url ";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
?>
<div id="main-content-wp" class="clearfix detail-product-page">
     <div class="wp-inner">
          <div class="secion" id="breadcrumb-wp">
               <div class="secion-detail">
                    <ul class="list-item clearfix">
                         <li>
                              <a href="" title="">Trang chủ</a>
                         </li>
                         <li>
                              <?php
                              if ($count > 0) {
                                   while ($row = mysqli_fetch_assoc($res)) {
                                        $prod_name = $row['name'];
                                        $main_img = $row['img'];
                                        $main_img2 = $row['img2'];
                                        $main_img3 = $row['img3'];
                                        $main_img4 = $row['img4'];
                                        $main_img5 = $row['img5'];
                                        $name = $row['name'];
                                        $view = $row['viewer'];
                                        $ingredient = $row['ingredient'];
                                        $status = $row['status'];
                                        $quantity = $row['quantity'];
                                        $old_price = $row['price'];
                                        $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
                                        $description = $row['description'];
                              ?>
                              <a href="" title=""><?= $prod_name ?></a>
                              <?php
                                   }
                              }
                              ?>
                         </li>
                    </ul>
               </div>
          </div>

          <div class="main-content fl-right">
               <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                         <div class="thumb-wp fl-left">
                              <a href="" title="" id="main-thumb">
                                   <img style=" width: 300px;height: 450px; object-fit: cover" src="<?= $main_img ?>">
                              </a>
                              <div id="list-thumb">
                                   <a href="">
                                        <img src="<?= $main_img2 ?>" id="zoom">
                                   </a>
                                   <a href="">
                                        <img src="<?= $main_img3 ?>" id="zoom2">
                                   </a>
                                   <a href="">
                                        <img src="<?= $main_img4 ?>" id="zoom3">
                                   </a>
                                   <a href="">
                                        <img src="<?= $main_img5 ?>" id="zoom4">
                                   </a>
                              </div>
                         </div>
                         <!-- <div class="thumb-respon-wp fl-left">
                              <img src="public/images/img-pro-01.png" alt="">
                         </div> -->
                         <div class="info fl-right">
                              <h3 class="product-name"><?= $name ?></h3>
                              <div class="desc">
                                   <p>Lượt xem: <?= $view ?></p>
                                   <p>
                                        Thành phần: <?= $ingredient ?>
                                   </p>
                              </div>
                              <div class="num-product">
                                   <span class="">Sản phẩm: </span>
                                   <?php if ($quantity > 0) : ?>
                                   <span class="status">Còn <span id="max-value"><?= $quantity ?></span> cái</span>
                                   <?php endif; ?>
                                   <?php if ($quantity == 0) : ?>
                                   <span class="status">Hết hàng</span>
                                   <?php endif; ?>
                              </div>
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
                              <div id="num-order-wp">
                                   <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                   <input style="width: 70px" readonly type="text" name="num-order" value="1" id="num-order">
                                   <a title="" id="plus"><i class="fa fa-plus"></i></a>

                              </div>
                              <?php
                              if ($quantity == 0) {
                              ?>
                              <button style="<?= $quantity == 0 ? 'background-color: grey' : ''  ?>" type="button"
                                   <?= $quantity == 0 ? ' disabled ' : ''  ?>
                                   onClick="insertCartForDetailpage('<?= $prod_id_from_url ?>','<?= $prod_name ?>', '<?= $main_img ?>', '<?= $new_price  ?>')"
                                   title="Thêm giỏ hàng" class="add-cart">Hết hàng</button>

                              <?php
                              }
                              ?>

                              <?php
                              if ($quantity != 0) {
                              ?>
                              <button style="<?= $quantity == 0 ? 'background-color: grey' : ''  ?>" type="button"
                                   <?= $quantity == 0 ? ' disabled ' : ''  ?>
                                   onClick="insertCartForDetailpage('<?= $prod_id_from_url ?>','<?= $prod_name ?>', '<?= $main_img ?>', '<?= $new_price  ?>')"
                                   title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</button>
                              <?php
                              }
                              ?>
                         </div>
                    </div>
               </div>
               <div class="section" id="post-product-wp">
                    <div class="section-head">
                         <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                         <?= $description ?>
                    </div>
               </div>
               <div class="section" id="post-product-wp">
                    <div class="section-head">
                         <h3 class="section-title">Đánh giá và Bình luận</h3>
                    </div>
                    <div class="section-detail comment">
                         <div class="stars">
                              <label>Đánh giá</label><br>
                              <form action="">
                                   <input class="star star-5" id="star-5" type="radio" name="star" />
                                   <label class="star star-5" for="star-5"></label>
                                   <input class="star star-4" id="star-4" type="radio" name="star" />
                                   <label class="star star-4" for="star-4"></label>
                                   <input class="star star-3" id="star-3" type="radio" name="star" />
                                   <label class="star star-3" for="star-3"></label>
                                   <input class="star star-2" id="star-2" type="radio" name="star" />
                                   <label class="star star-2" for="star-2"></label>
                                   <input class="star star-1" id="star-1" type="radio" name="star" />
                                   <label class="star star-1" for="star-1"></label>
                              </form>
                              <label style="padding-bottom: 5px;">Bình Luận</label><br>
                              <textarea rows="4" cols="115" name="comment" form="usrform"
                                   placeholder="Bình luận về món ăn..."></textarea>
                              <button class="button button1"><a style="color: #fff; size: 20px;" href="#">Bình
                                        luận</a></button>
                         </div>
                    </div>
               </div>
               <?php
               require 'hot_product.php';
               ?>
          </div>
          <?php
          require './inc/sidebar.php';
          ?>
     </div>
</div>
</div>