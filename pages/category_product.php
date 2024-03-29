<?php
include './admin/page/connect.php';
// lấy URL trên thanh địa chỉ
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);

// lấy ra parameter có tên là cate_id, paging
$cate_id_from_url = $query['cate_id'];
$paging = $query['paging'];
// var_dump($paging);
// die();

$sql2 = "SELECT * FROM product WHERE category = $cate_id_from_url ";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
$results_per_page = 8;
$number_of_page = ceil($count2 / $results_per_page);
$start = ($paging - 1) * $results_per_page;

$sql3 = "SELECT * FROM product WHERE category = $cate_id_from_url LIMIT $start, $results_per_page";
$res3 = mysqli_query($conn, $sql3);
$count3 = mysqli_num_rows($res3);
?>
<div id="main-content-wp" class="clearfix category-product-page">
     <div class="wp-inner">
          <div class="secion" id="breadcrumb-wp">
               <div class="secion-detail">
                    <ul class="list-item clearfix">
                         <li>
                              <a href="" title="">Trang chủ</a>
                         </li>
                         <li>
                              <?php
                              $sql = "SELECT * FROM category WHERE category_id = $cate_id_from_url ";
                              $res = mysqli_query($conn, $sql);
                              $count = mysqli_num_rows($res);
                              if ($count > 0) {
                                   while ($row = mysqli_fetch_assoc($res)) {
                                        $cate_name = $row['category_name'];
                              ?>
                              <a href="" title=""><?= $cate_name ?></a>
                              <?php
                                   }
                              }
                              ?>
                         </li>
                    </ul>
               </div>
          </div>
          <div class="main-content fl-right">
               <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                         <h3 class="section-title fl-left"><?= $cate_name ?></h3>
                         <div class="filter-wp fl-right">
                              <p class="desc">Hiển thị <?= $count3 ?> trên <?= $count2  ?> món ăn</p>
                              <div class="form-filter">
                                   <form method="POST">
                                        <select name="taskOption">
                                             <option value="0">Sắp xếp</option>
                                             <option value="1">Từ A - Z</option>
                                             <option value="2">Từ Z - A</option>
                                             <option value="3">Giá cao xuống thấp</option>
                                             <option value="4">Giá thấp lên cao</option>
                                        </select>
                                        <!-- <div class="dropdown">  
                                             <button class="dropbtn"> ---Sắp xếp---</button>  
                                             <div class="dropdown-content">  
                                                  <a href="sort.php?q=asc"> A - Z </a>  
                                                  <a href=""> Z - A </a>  
                                                  <a href=""> Giá cáo -> thấp </a>  
                                                  <a href=""> Giá thấp -> cao </a>  
                                             </div>  
                                        </div>   -->
                                        <?php
                                        if (isset($_POST['taskOption'])) {
                                             $select = $_POST['taskOption'];
                                             include './admin/page/connect.php';
                                             $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                             // var_dump($url);
                                             // die();
                                             $parts = parse_url($url);
                                             parse_str($parts['query'], $query);
                                             $cate_id_from_url = $query['cate_id'];
                                             // var_dump($cate_id_from_url);
                                             $paging = $query['paging'];
                                             // var_dump($paging);
                                             // die();

                                             $sql2 = "SELECT * FROM product WHERE category = $cate_id_from_url ";
                                             $res2 = mysqli_query($conn, $sql2);
                                             $count2 = mysqli_num_rows($res2);
                                             $results_per_page = 8;
                                             $number_of_page = ceil($count2 / $results_per_page);
                                             $start = ($paging - 1) * $results_per_page;
                                             switch ($select) {
                                                  case '1':
                                                       $sql3 = "SELECT * FROM bepcuangoc.product WHERE category = '$cate_id_from_url' ORDER BY name ASC LIMIT $start, $results_per_page";
                                                       $res3 = mysqli_query($conn, $sql3);
                                                       $count3 = mysqli_num_rows($res3);
                                                       break;
                                                  case '2':
                                                       $sql3 = "SELECT * FROM bepcuangoc.product WHERE category = '$cate_id_from_url' ORDER BY name DESC LIMIT $start, $results_per_page";
                                                       $res3 = mysqli_query($conn, $sql3);
                                                       $count3 = mysqli_num_rows($res3);
                                                       break;
                                                  case '3':
                                                       $sql3 = "SELECT * FROM bepcuangoc.product WHERE category = '$cate_id_from_url' ORDER BY price DESC LIMIT $start, $results_per_page";
                                                       $res3 = mysqli_query($conn, $sql3);
                                                       $count3 = mysqli_num_rows($res3);
                                                       break;
                                                  case '4':
                                                       $sql3 = "SELECT * FROM bepcuangoc.product WHERE category = '$cate_id_from_url' ORDER BY price ASC LIMIT $start, $results_per_page";
                                                       $res3 = mysqli_query($conn, $sql3);
                                                       $count3 = mysqli_num_rows($res3);
                                                       break;
                                                  default:
                                                       # code...
                                                       break;
                                             }
                                        }
                                        ?>
                                        <button type="submit">Lọc</button>
                                        <!-- <a type="submit" href="?page=detail_product&id=<?= $prod_id ?>" title="" class="thumb">
                                             Lọc
                                        </a> -->
                                   </form>
                              </div>
                         </div>
                    </div>
                    <div class="section-detail">
                         <ul class="list-item clearfix">
                              <?php
                              if ($count3 > 0) {
                                   while ($row3 = mysqli_fetch_assoc($res3)) {
                                        $prod_id = $row3['product_id'];
                                        $img = $row3['img'];
                                        $name = $row3['name'];
                                        $old_price = $row3['price'];
                                        $quantity = $row3['quantity'];
                                        $new_price = $row3['price'] - $row3['price'] * $row3['discount'] / 100;
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
                                        <!-- <a style="text-align: center;" href="?page=cart" ti tle="Thêm giỏ hàng"
                                             class="add-cart fl-center">Thêm giỏ
                                             hàng</a> -->
                                        <?php if ($quantity != 0) {

                                                  ?>
                                        <a type="button"
                                             style="text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                                             onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                                             title="Thêm giỏ hàng" class="add-cart fl-center">Thêm giỏ
                                             hàng</a>
                                        <?php } ?>

                                        <?php if ($quantity == 0) {

                                                  ?>
                                        <a type="button"
                                             style="text-align: center; <?= $quantity == 0 ? 'background-color: grey; pointer-events: none;' : ''  ?>"
                                             onClick="showHint('<?= $prod_id ?>','<?= $name ?>', '<?= $img ?>', '<?= $new_price  ?>')"
                                             title="Thêm giỏ hàng" class="add-cart fl-center">Hết hàng</a>
                                        <?php } ?>
                                   </div>
                              </li>
                              <?php
                                   }
                              }
                              ?>
                         </ul>
                    </div>
               </div>
               <div class="section" id="paging-wp">
                    <div class="section-detail">
                         <ul class="list-item clearfix">
                              <?php
                              for ($i = 1; $i <= $number_of_page; $i++) {
                              ?>
                              <li>
                                   <a href="?page=category_product&cate_id=<?= $cate_id_from_url ?>&paging=<?= $i ?>"
                                        title=""><?= $i ?></a>
                              </li>
                              <?php
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