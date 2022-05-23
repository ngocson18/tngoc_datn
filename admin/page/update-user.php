<?php 
     require 'connect.php';
     include './header.php';
?>
<?php
     // Select
     $id = $_GET['id'];
     $sql = "SELECT * FROM user WHERE user_id = $id";
     
     $res = mysqli_query($conn, $sql);

     if(!$res){
          die("Không thể thực hiện câu lệnh SQL: ".mysqli_error($conn));
          exit();
     }

     while($row = mysqli_fetch_assoc($res)){
          $user_id = $row['user_id'];
          $user_name = $row['user_name'];
          $password = $row['password'];
          $user_phone = $row['user_phone'];
          $user_email = $row['user_email'];
          $user_address = $row['user_address'];
          $role_user = $row['role_user'];
     }
     
     //Update
     if(isset($_POST['submit'])){
          $user_id = $_POST['user_id'];
          $user_name = $_POST['user_name'];
          $password = $_POST['password'];
          $user_email = $_POST['user_email'];
          $user_address = $_POST['user_address'];
          $user_phone = $_POST['user_phone'];
          $role_user = $_POST['role_user'];

          $sql2 = "UPDATE user SET
               user_name = '$user_name',
               password = '$password',
               user_email = '$user_email',
               user_address = '$user_address',
               user_phone = '$user_phone',
               role_user = '$role_user'
               WHERE user_id = $user_id
          ";
          $res2 = mysqli_query($conn, $sql2);

          if($res2 === TRUE){
               echo "Add User Successfully";
               echo "<script type='text/javascript'> window.location.assign('?page=list-user')</script>";
          }else{
               echo "Error: ".$sql.":-".mysqli_error($conn);
          }
          
     }
     if(isset($_POST['rSubmit'])){
          echo "<script type='text/javascript'> window.location.assign('?page=list-user')</script>";
     }
// mysqli_close($conn);
?>

<div id="main-content-wp" class="add-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php' ?>
          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Cập nhật thông tin người dùng</h3>
                    </div>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <form action="" method="POST">
                              <div class="form-group">
                                   <label for="title">ID</label>
                                   <input type="text" name="user_id" id="title" value="<?php echo $user_id; ?>"
                                        readonly>
                              </div>
                              <div class="form-group">
                                   <label for="title">Tên người dùng</label>
                                   <input type="text" name="user_name" id="title" value="<?php echo $user_name; ?>">
                              </div>
                              <div class="form-group">
                                   <label for="title">Mật khẩu</label>
                                   <input type="text" name="password" id="password" value="<?php echo $password; ?>">
                              </div>
                              <div class="form-group">
                                   <label for="title">Địa chỉ</label>
                                   <input type="text" name="user_address" id="address"
                                        value="<?php echo $user_address; ?>">
                              </div>
                              <div class="form-group">
                                   <label for="title">Số điện thoại</label>
                                   <input type="text" name="user_phone" id="phone" value="<?php echo $user_phone; ?>">
                              </div>
                              <div class="form-group">
                                   <label for="title">Email</label>
                                   <input type="text" name="user_email" id="email" value="<?php echo $user_email; ?>">
                              </div>
                              <div class="form-group">
                                   <label for="exampleFormControlSelect1">Quyền truy cập</label>
                                   <select class="form-control" name='role_user' value="<?php echo  $role_user;?>">
                                        <option value='0'>Quản trị viên</option>
                                        <option value='1'>Khách hàng</option>
                                   </select>
                              </div>

                              <div class="form-group">
                                   <button type="submit" name="submit" id="btn-submit">Cập nhật thông tin người
                                        dùng</button>
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