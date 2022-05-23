<?php 
     include 'connect.php';
     include './header.php';
?>

<?php 
     // include 'login.php';

     // if(isset($_SESSION['submit'])){
     //      $sql2 = "SELECT * FROM user WHERE user_phone =".$_SESSION['user'];
     //      $res2 = mysqli_query($conn, $sql2);
     //      $row = mysqli_fetch_assoc($res2);

     //      if($row['role_user'] == 0){
               
     //      }else{
     //           echo "Login successfully";
     //           echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
     //      }
     // }else{
     //      echo "<script type='text/javascript'> window.location.assign('?page=login')</script>";
     // }
?>

<?php 
//Delete product by ID
     if(isset($_GET['id'])){
          $id = $_GET['id'];

          $sql1 = "DELETE FROM product WHERE product_id = $id";

          $res1= mysqli_query($conn, $sql1);
          if($res1 === TRUE){
               echo "Delete product Successfully";
               echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
          }else{
               echo "Error: ".$sql.":-".mysqli_error($conn);
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
                                             if($count > 0){
                                                  while($row = mysqli_fetch_assoc($res)){
                                                       $product_id = $row['product_id'];
                                                       $name = $row['name'];
                                                       $title = $row['title'];
                                                       $description = $row['description'];
                                                       $price = $row['price'];
                                                       $discount = $row['discount'];
                                                       $price_discount = $row['price_discount'];
                                                       $category = $row['category'];
                                                       $img = $row['img'];
                                                       $img_src = '../'.$img;
                                                       // $img = $row['img'];
                                                       // $name = $row['name'];
                                                       ?>
                                        <tr>
                                             <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                             <td><span class="tbody-text"><?php echo $sn++ ;?></span></td>
                                             <td><span class="tbody-text"><?php echo $name;?></span></td>
                                             <td style="max-width: 100px;"><span
                                                       class="tbody-text"><?php echo $title; ?></span></td>
                                             <td style="max-width: 200px;"><span
                                                       class="tbody-text"><?php echo $description; ?></span></td>
                                             <td><span class="tbody-text">
                                                       <?php
                                                            if($category == 1){
                                                                 echo "Đồ ăn vặt Việt Nam";
                                                            }elseif($category == 2){
                                                                 echo "Đồ ăn vặt Hàn Quốc";
                                                            }elseif($category == 3){
                                                                 echo "Đồ ăn vặt Thái Lan";
                                                            }elseif($category == 4){
                                                                 echo "Đồ ăn vặt Khác";
                                                            }elseif($category == 5){
                                                                 echo "Đồ uống";
                                                            }elseif($category == 6){
                                                                 echo "Bánh ngọt";
                                                            }
                                                       ?>
                                                  </span></td>
                                             <td style="max-width: 100px;"><span
                                                       class="tbody-text"><?php echo $price; ?> đ</span></td>
                                             <td><span class="tbody-text"><?php echo $discount; ?>%</span></td>
                                             <td><span class="tbody-text"><?php echo $price_discount; ?> đ</span></td>
                                             <td><span class="tbody-text">
                                                       <?php  
                                                            echo "<div><img src=$img_src style='width:250px'></div>";
                                                       ?>
                                             </td>
                                             <td class="clearfix">
                                                  <ul class="list-operation fl-left">
                                                       <li><a href="?page=update-product&id=<?= $product_id;?>"
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
