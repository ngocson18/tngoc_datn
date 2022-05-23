<?php
     include 'connect.php';
     include './header.php';
?>
<div id="main-content-wp" class="add-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>

          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 class="fl-left" id="index">Thêm món ăn</h3>
                    </div>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <form action="" method="POST">
                              <div class="form-group">
                                   <label for="product-name">Tên món ăn</label>
                                   <input type="text" name="name" id="product-name">
                              </div>

                              <div class="form-group">
                                   <label for="product-name">Tiêu đề món ăn</label>
                                   <input type="text" name="title" id="product-code">
                              </div>

                              <div class="form-group">
                                   <label for="price">Giá món ăn</label>
                                   <input type="text" name="price" id="price">
                              </div>

                              <div class="form-group">
                                   <label for="discount">Khuyễn mãi</label>
                                   <input type="text" name="discount" id="price">
                              </div>

                              <div class="form-group">
                                   <label for="discount">Gía Khuyễn mãi</label>
                                   <input type="text" name="price_discount" id="price">
                              </div>

                              <div class="form-group">
                                   <label for="discretion">Mô tả món ăn</label>
                                   <textarea name="description" id="desc" cols="30" rows="10"
                                        class="ckeditor"></textarea>
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

                              <button type="submit" name="submit" id="btn-submit">Thêm món ăn</button>

                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>


<?php 
     // $img = "";
     // function randomString()
     // {
     //      $random = substr(md5(mt_rand()), 0, 7);
     //      return $random;
     // }
     if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $title = $_POST['title'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $discount = $_POST['discount'];
          $price_discount = $_POST['price_discount'];
          $category = $_POST['category'];
          // $img = $_POST['img'];
          // if(isset($_FILES['img'])){
          //      $img = $_FILES['img']['name'];
          //      // print_r($_FILES['img']); die();
          //      if($img == ""){
          //           $random = "food.jpg";
          //      }else {
          //           $random = randomString().$img;
          //      }
          // }

          //Code xu ly
          if($name == ""){
               header('location: ?page=add-product');
          }else{
               // move_uploaded_file($_FILES['img']['tmp_name'], '../images/'.$random);
               
               $sql = "INSERT INTO product(name, title, description, price, discount,price_discount, category) 
               VALUES ('$name', '$title', '$description', '$price', '$discount','$price_discount','$category')";
               
               $res = mysqli_query($conn, $sql);
     
               if($res === true){
                    echo "Add product successfully";
                    echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
               }else{
                    echo "Error: ".$sql.":-".mysqli_error($conn);
               }
          }
     // mysqli_close($conn);
     }
?>

<?php
     include './footer.php';
?>