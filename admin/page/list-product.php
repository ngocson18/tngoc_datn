<?php
include 'connect.php';
include './header.php';
?>

<?php
//Delete product by ID
if (isset($_GET['id'])) {
     $id = $_GET['id'];

     $sql1 = "DELETE FROM product WHERE product_id = $id";

     $res1 = mysqli_query($conn, $sql1);
     if ($res1 === TRUE) {
          echo "Delete product Successfully";
          echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
     } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
}

if (!function_exists('currency_format')) {
     function currency_format($number, $suffix = ' vnđ')
     {
          if (!empty($number)) {
               return number_format($number, 0, ',', '.') . "{$suffix}";
          }
     }
}
?>

<div id="main-content-wp" class="list-product-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>
          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Danh sách món ăn</h3>
                         <a href="?page=add-product" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
                    <form method="GET" class="form-s fl-right">
                         <input type="text" name="s" id="s">
                         <input type="submit" name="sm_s" value="Tìm kiếm">
                    </form>
               </div>
               <div class="actions">
                    <form method="GET" action="" class="form-actions">
                         <select name="actions">
                              <option value="0">Tác vụ</option>
                              <option value="1">Công khai</option>
                              <option value="1">Chờ duyệt</option>
                              <option value="2">Bỏ vào thủng rác</option>
                         </select>
                         <input type="submit" name="sm_action" value="Áp dụng">
                    </form>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <div class="table-responsive">
                              <table class="table list-table-wp table-bordered">
                                   <thead>
                                        <tr>
                                             <!-- <td><input type="checkbox" name="checkAll" id="checkALL"></td> -->
                                             <td class="thead-text"><span>STT</span></td>
                                             <td class="thead-text"><span>Tên món ăn</span></td>
                                             <td class="thead-text">Tiêu đề món ăn</td>
                                             <td class="thead-text"><span>Mô tả món ăn</span></td>
                                             <td class="thead-text">Danh mục sản phẩm</td>
                                             <td class="thead-text"><span>Giá</span></td>
                                             <td class="thead-text"><span>SL</span></td>
                                             <td class="thead-text"><span>Khuyến mãi</span></td>
                                             <td class="thead-text"><span>Giá ưu đãi</span></td>
                                             <td class="thead-text"><span>Hình ảnh món ăn</span></td>
                                             <td class="thead-text"><span>Thao tác</span></td>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <?php
                                        $sql = "SELECT * FROM product ORDER BY product_id DESC";

                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        $sn = 1;
                                        if ($count > 0) {
                                             while ($row = mysqli_fetch_assoc($res)) {
                                                  $product_id = $row['product_id'];
                                                  $name = $row['name'];
                                                  $title = $row['title'];
                                                  $description = $row['description'];
                                                  $price = $row['price'];
                                                  $discount = $row['discount'];
                                                  $new_price = $row['price'] - $row['price'] * $row['discount'] / 100;
                                                  $category = $row['category'];
                                                  $sl = $row['quantity'];
                                                  $img = $row['img'];
                                                  $isSpecial = $row['isSpecial'];
                                                  $img_src = '../' . $img;
                                                  // $img = $row['img'];
                                                  // $name = $row['name'];
                                        ?>
                                        <tr>
                                             <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                             <td><span class="tbody-text"><?php echo $sn++; ?></span></td>
                                             <td><span class="tbody-text <?php if ($isSpecial == 1) {
                                                                                          echo ' hight-light';
                                                                                     } ?>"><?php echo $name; ?></span>
                                             </td>
                                             <td style="max-width: 100px;"><span
                                                       class="tbody-text"><?php echo $title; ?></span></td>
                                             <td style="max-width: 200px;"><span
                                                       class="tbody-text"><?php echo $description; ?></span></td>
                                             <td><span class="tbody-text">
                                                       <?php
                                                                 if ($category == 1) {
                                                                      echo "Đồ ăn vặt Việt Nam";
                                                                 } elseif ($category == 2) {
                                                                      echo "Đồ ăn vặt Hàn Quốc";
                                                                 } elseif ($category == 3) {
                                                                      echo "Đồ ăn vặt Thái Lan";
                                                                 } elseif ($category == 4) {
                                                                      echo "Đồ ăn vặt Khác";
                                                                 } elseif ($category == 5) {
                                                                      echo "Đồ uống";
                                                                 } elseif ($category == 6) {
                                                                      echo "Bánh ngọt";
                                                                 }
                                                                 ?>
                                                  </span></td>
                                             <td style="max-width: 100px;"><span
                                                       class="tbody-text"><?php echo currency_format($price); ?>
                                                  </span></td>
                                             <td style="max-width: 100px;"><span
                                                       class="tbody-text"><?php echo $sl; ?></span></td>
                                             <td><span class="tbody-text"><?php echo $discount; ?>%</span></td>
                                             <td><span class="tbody-text"><?php echo currency_format($new_price); ?>
                                                  </span></td>
                                             <td><span class="tbody-text">
                                                       <?php
                                                                 echo "<div><img src=$img_src style='width:250px'></div>";
                                                                 ?>
                                             </td>
                                             <td class="tbody-text">
                                                  <ul class="list-operation fl-left">
                                                       <li><a href="?page=update-product&id=<?= $product_id; ?>"
                                                                 title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                      aria-hidden="true"
                                                                      style="font-size: 20px; margin-bottom: 10px; padding-bottom: 10px ;"></i></a>
                                                       </li>
                                                       <li><a href="?page=list-product&id=<?= $product_id; ?>"
                                                                 title="Xóa" class="delete"><i class="fa fa-trash"
                                                                      aria-hidden="true"
                                                                      style="font-size: 20px;"></i></a>
                                                       </li>
                                                  </ul>
                                             </td>
                                        </tr>
                                        <?php
                                             }
                                        }
                                        ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php
include './footer.php';
?>