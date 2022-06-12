<?php
include 'connect.php';
include './header.php';
?>
<div id="main-content-wp" class="add-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>
          <div id="content" class="fl-left">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Add Role</h3>
                    </div>
               </div>

               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <form action="" method="POST">
                              <div class="form-group">
                                   <label for="title">Tên Quyền:</label>
                                   <input type="text" name="role_name" id="title">
                              </div>
                              <div class="form-group">
                                   <label for="exampleFormControlSelect1">Quyền truy cập:</label>
                                   <select class="form-control" name='role_user'>
                                        <option value='0'>Quản trị viên</option>
                                        <option value='1'>Khách hàng</option>
                                   </select>
                              </div>

                              <button type="submit" name="btn-submit" id="btn-submit">Thêm quyền</button>
                         </form>
                         <?php
                         if (isset($_POST['submit'])) {
                              // $role_id = $_POST['role_id'];
                              $role_name = $_POST['role_name'];
                              $role_user = $_POST['role_user'];

                              if ($role_name == "") {
                                   header('location: ?page=add-role');
                              } else {
                                   $sql = "INSERT INTO role(role_name,role_user) 
                                   VALUES('$role_name', '$role_user')";

                                   $res = mysqli_query($conn, $sql);

                                   // var_dump($res);
                                   // die();
                                   if ($res == TRUE) {
                                        echo "Add Role Successfully";
                                        echo "<script type='text/javascript'> window.location.assign('?page=list-role')</script>";
                                   } else {
                                        echo "Error: " . $sql . ":-" . mysqli_error($conn);
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
