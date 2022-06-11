<?php
include './admin/page/connect.php';
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);

parse_str($parts['query'], $query);
$keyword = $query['q'];
// http://localhost/tngoc_datn/?page=search_product&q=%C3%A1dsdsas
$sql2 = "SELECT * FROM product WHERE name LIKE '%$keyword%'";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
?>
<div id="main-content-wp" class="clearfix category-product-page">
     <div class="wp-inner">
          <div class="secion" id="breadcrumb-wp">
               <div class="secion-detail">
                    <ul class="list-item clearfix">
                         <li>
                              <a style="font-size: 25px" href="" title="">Tìm kiếm với từ khóa <b> <?= $keyword ?>
                                   </b></a>
                         </li>
                    </ul>
               </div>
          </div>
          <div class="main-content fl-right">
               <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                         <!-- <h3 class="section-title fl-left"><?= $cate_name ?></h3> -->
                         <div class="filter-wp fl-right">
                              <p class="desc">Hiển thị <?= $count2  ?> món ăn</p>
                         </div>
                    </div>
                    <div class="section-detail">
                         <ul class="list-item clearfix">
                              <?php
                              if ($count2 > 0) {
                                   while ($row2 = mysqli_fetch_assoc($res2)) {
                                        $prod_id = $row2['product_id'];
                                        $img = $row2['img'];
                                        $name = $row2['name'];
                                        $old_price = $row2['price'];
                                        $new_price = $row2['price'] - $row2['price'] * $row2['discount'] / 100;
                              ?>
                              <li>
                                   <a href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                                        <img src="<?= $img ?>" style="width: 600px;height: 200px; object-fit: cover">
                                   </a>
                                   <a href="?page=detail_product&id=<?= $prod_id ?>" title=""
                                        class="product-name"><?= $name  ?></a>
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
          </div>
          <?php
          require './inc/sidebar.php';
          ?>
     </div>
</div>