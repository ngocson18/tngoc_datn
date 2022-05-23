<?php
     require 'connect.php';
     include './header.php';
?>
<?php
     // Select data
     $id = $_GET['id'];

     $sql = "SELECT * FROM product WHERE product_id = $id";

     $res = mysqli_query($conn, $sql);

     if(!$res){
          die("Không thể thực hiện câu lệnh SQL: ".mysqli_error($conn));
          exit();
     }

     while($row = mysqli_fetch_assoc($res)){
          $product_id = $row['product_id'];
          $name = $row['name'];
          $title = $row['title'];
          $description = $row['description'];
          $price = $row['price'];
          $discount = $row['discount'];
          $price_discount = $row['price_discount'];
          $category = $row['category'];
     }

     // Update product
     if(isset($_POST['submit'])){
          $product_id = $_POST['product_id'];
          $name = $_POST['name'];
          $title = $_POST['title'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $discount = $_POST['discount'];
          $price_discount = $row['price_discount'];
          $category = $_POST['category'];

          $sql2 = "UPDATE Product SET
               name = '$name',
               title = '$title',
               description = '$description',
               price = '$price',
               discount = '$discount',
               price_discount = '$price_discount',
               category = '$category' 
               WHERE product_id = $product_id
          ";
          
          $res2 = mysqli_query($conn, $sql2);
          
          if($res2 === TRUE){
               echo "Add product Successfully";
               echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
          }else{
               echo "Error: ".$sql.":-".mysqli_error($conn);
          }

     }
     if(isset($_POST['rSubmit'])){
          echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
     }
?>
<div id="main-content-wp" class="add-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>

          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 class="fl-left" id="index">Cập nhật món ăn</h3>
                    </div>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <form action="" method="POST">
                              <div class="form-group">
                                   <label for="product-name">ID</label>
                                   <input type="text" name="product_id" id="product-name"
                                        value="<?php echo $product_id; ?>" readonly>
                              </div>

                              <div class="form-group">
                                   <label for="product-name">Tên món ăn</label>
                                   <input type="text" name="name" id="product-name" value="<?= $name; ?>">
                              </div>

                              <div class="form-group">
                                   <label for="product-name">Tiêu đề món ăn</label>
                                   <input type="text" name="title" id="product-code" value="<?= $title; ?>">
                              </div>

                              <div class=" form-group">
                                   <label for="price">Giá món ăn</label>
                                   <input type="text" name="price" id="price" value="<?= $price; ?>">
                              </div>

                              <div class="form-group">
                                   <label for="discount">Khuyễn mãi</label>
                                   <input type="text" name="discount" id="price" value="<?= $discount; ?>">
                              </div>

                              <div class="form-group">
                                   <label for="discount">Gía Khuyễn mãi</label>
                                   <input type="text" name="price_discount" id="price" value="<?= $price_discount; ?>">
                              </div>

                              <div class="form-group">
                                   <label for="discretion">Mô tả món ăn</label>
                                   <textarea name="description" id="desc" cols="30" rows="10" class="ckeditor">
                                        <?php echo $description;?>
                                   </textarea>
                              </div>

                              <div class="form-group">
                                   <label for="exampleFormControlSelect1">Danh mục món ăn</label>
                                   <select name="category" class="form-control">
                                        <option value="1">Đồ ăn vặt Việt Nam</option>
                                        <option value="2">Đồ ăn vặt Hàn Quốc</option>
                                        <option value="3">Đồ ăn vặt Thái Lan</option>
                                        <option value="4">Đồ ăn vặt Khác</option>
                                        <option value="5">Đồ uống</option>
                                        <option value="6">Bánh ngọt</option>
                                   </select>
                              </div>

                              <div class="form-group">
                                   <label>Hình ảnh</label>
                                   <div id="uploadFile">
                                        <input type="file" name="image" id="upload-thumb">
                                   </div>
                              </div>
                              <div class="from-group">
                                   <button type="submit" name="submit" id="btn-submit">Cập nhật món ăn</button>
                                   <button type="submit" name="rSubmit" id="btn-submit">Hủy tác vụ</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php 
     include './footer.php';
?>