<?php 
     include 'connect.php';
     include './header.php';
?>



<div id="main-content-wp" class="add-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php' ?>
          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Thêm mới người dùng</h3>
                    </div>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <form action="" method="POST">
                              <div class="form-group">
                                   <label for="title">Tên người dùng</label>
                                   <input required class="form-control" type="text" name="user_name" id="title">
                              </div>
                              <div class="form-group">
                                   <label for="title">Mật khẩu</label>
                                   <input required class="form-control" type="text" name="password" id="password">
                              </div>
                              <div class="form-group">
                                   <label for="title">Địa chỉ</label>
                                   <input required class="form-control" type="text" name="user_address" id="address">
                              </div>
                              <div class="form-group">
                                   <label for="title">Số điện thoại</label>
                                   <input required onkeyup="validatePhone(this.value)" class="form-control" type="text" name="user_phone" id="phone">
                                   <span id="validatePhone" style="color: red; display: none">Sai định dạng</span>
                              </div>
                              <div class="form-group">
                                   <label for="title">Email</label>
                                   <input required class="form-control" type="text" name="user_email" id="email">
                              </div>
                              <div class="form-group">
                                   <label for="exampleFormControlSelect1">Quyền truy cập</label>
                                   <select class="form-control" name='role_user'>
                                        <option value='0'>Quản trị viên</option>
                                        <option value='1'>Khách hàng</option>
                                   </select>
                              </div>


                              <button disabled type="submit" name="submit" id="btn-submit">Thêm người dùng</button>
                         </form>
                         <?php 
                              if(isset($_POST['submit'])){
                                   $user_name = $_POST['user_name'];
                                   $password = $_POST['password'];
                                   $user_email = $_POST['user_email'];
                                   $user_address = $_POST['user_address'];
                                   $user_phone = $_POST['user_phone'];
                                   $role_user = $_POST['role_user'];

                                   if($user_name == ""){
                                        header('location: ?page=add-user');
                                   }else{
                                        $sql = "INSERT INTO user(user_name, password, user_email, user_address, user_phone, role_user) 
                                        VALUES('$user_name', '$password', '$user_email', '$user_address', '$user_phone', '$role_user')";
                                        
                                        $res = mysqli_query($conn, $sql);
                                        
                                        if($res === TRUE){
                                             echo "Add User Successfully";
                                             echo "<script type='text/javascript'> window.location.assign('?page=list-user')</script>";
                                        }else{
                                             echo "Error: ".$sql.":-".mysqli_error($conn);
                                        }
                                   }
                              }
                         ?>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php 
     include './footer.php';
?>
