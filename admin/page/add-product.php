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
                         <form action="" method="POST" enctype="multipart/form-data">
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
                                        <input type="file" name="upload-thumb" id="upload-thumb">
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

if (isset($_POST['submit'])) {
     $name = $_POST['name'];
     $title = $_POST['title'];
     $description = $_POST['description'];
     $price = $_POST['price'];
     $discount = $_POST['discount'];
     $price_discount = $_POST['price_discount'];
     $category = $_POST['category'];

     // $target_dir = "public/images/Food_img/";
     // $file = $_FILES['fileToUpload']['name'];
     // $target_file = $target_dir . $file;
     // $uploadOk = 1;

     //Thư mục bạn sẽ lưu file upload
     $target_dir    = "public/images/Food_img/";
     //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
     $target_file   = $target_dir . basename($_FILES["upload-thumb"]["name"]);

     $allowUpload   = true;

     //Lấy phần mở rộng của file (jpg, png, ...)
     $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

     // Cỡ lớn nhất được upload (bytes)
     $maxfilesize   = 800000;

     ////Những loại file được phép upload
     $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
     // var_dump($_FILES, $file);
     // die();
     $check = getimagesize($_FILES["upload-thumb"]["tmp_name"]);

     if ($check !== false) {
          echo "Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
     } else {
          echo "Không phải file ảnh.";
          $allowUpload = false;
     }


     if (file_exists($target_file)) {
          echo "Tên file đã tồn tại trên server, không được ghi đè";
          $allowUpload = false;
     }

     if (!in_array($imageFileType, $allowtypes)) {
          echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
          $allowUpload = false;
     }

     //Code xu ly
     if ($name == "") {
          header('location: ?page=add-product');
     } else {
          // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
          if (move_uploaded_file($_FILES["upload-thumb"]["tmp_name"], $target_file)) {
               echo "File" . basename($_FILES["upload-thumb"]["name"]) .
                    "Đã upload thành công.";

               echo "File lưu tại" . $target_file;
          } else {
               echo "Có lỗi xảy ra khi upload file.";
          }

          $sql = "INSERT INTO product(name, title, description, price, img, discount, price_discount, category) 
               VALUES ('$name', '$title', '$description', '$price', '$target_file',  '$discount', '$price_discount','$category')";

          $res = mysqli_query($conn, $sql);

          if ($res === true) {
               echo "Add product successfully";
               echo "<script type='text/javascript'> window.location.assign('?page=list-product')</script>";
          } else {
               echo "Error: " . $sql . ":-" . mysqli_error($conn);
          }
     }
     // mysqli_close($conn);
}
?>

<?php
include './footer.php';
?>