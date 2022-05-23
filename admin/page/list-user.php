<?php
include 'connect.php';
include './header.php';
?>
<?php
if (isset($_GET['id'])) {
     $id = $_GET['id'];

     $sql1 = "DELETE FROM user WHERE user_id = $id";

     $res1 = mysqli_query($conn, $sql1);
     if ($res1 === TRUE) {
          echo "Delete User Successfully";
          echo "<script type='text/javascript'> window.location.assign('?page=list-user')</script>";
     } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
}
?>

<div id="main-content-wp">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>

          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Danh sách người dùng</h3>
                         <a href="?page=add-user" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
               </div>

               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <div class="table-responsive">
                              <table class="table list-table-wp table-bordered">
                                   <thead>
                                        <tr>
                                             <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                             <td><span class="thead-text">STT</span></td>
                                             <td><span class="thead-text">Username</span></td>
                                             <td><span class="thead-text">Password</span></td>
                                             <td><span class="thead-text">Address</span></td>
                                             <td><span class="thead-text">Phone</span></td>
                                             <td><span class="thead-text">Email</span></td>
                                             <td><span class="thead-text">Role user</span></td>
                                             <td><span class="thead-text">Thao tac</span></td>
                                        </tr>
                                   </thead>

                                   <tbody>

                                        <?php
                                        $sql = "SELECT * FROM user";

                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        $sn = 1;

                                        if ($count > 0) {
                                             while ($row = mysqli_fetch_assoc($res)) {
                                                  $user_id = $row['user_id'];
                                                  $user_name = $row['user_name'];
                                                  $user_phone = $row['user_phone'];
                                                  $user_email = $row['user_email'];
                                                  $user_address = $row['user_address'];
                                                  $role_user = $row['role_user'];
                                                  $password = $row['password'];
                                        ?>
                                        <tr>
                                             <!-- <td><input type="checkbox" name="CheckItem" class="checkItem"></td> -->
                                             <td><span class="tbody-text"><?php echo $sn++ ?></span></td>
                                             <td class="clearfix">
                                                  <div class="tb-title fl-left">
                                                       <span><?php echo $user_name; ?></span>
                                                  </div>
                                             </td>
                                             <td><span class="tbody-text"><?php echo $password; ?></span></td>
                                             <td><span class="tbody-text"><?php echo $user_address; ?></span></td>
                                             <td><span class="tbody-text"><?php echo $user_phone; ?></span></td>
                                             <td><span class="tbody-text"><?php echo $user_email; ?></span></td>
                                             <td><span class="tbody-text">
                                                       <?php
                                                                 if ($role_user == 0) {
                                                                      echo "Quản trị viên";
                                                                 } elseif ($role_user == 1) {
                                                                      echo "Khách hàng";
                                                                 } else {
                                                                      echo "Failed";
                                                                 }
                                                                 ?>
                                                  </span></td>
                                             <td class="clearfix">
                                                  <ul class="list-operation fl-right">
                                                       <li><a href="?page=update-user&id=<?= $user_id; ?>" title="Sửa"
                                                                 class="edit"><i class="fa fa-pencil" aria-hidden="true"
                                                                      style="font-size: 20px; margin-bottom: 10px; padding-bottom: 10px ;"></i></a>
                                                       </li>
                                                       <li><a href=" ?page=list-user&id=<?= $user_id ?>" title="Xóa"
                                                                 class="delete"><i class="fa fa-trash"
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
                         </div>;
                    </div>
               </div>
          </div>
     </div>
</div>

<?php
include './footer.php';
?>