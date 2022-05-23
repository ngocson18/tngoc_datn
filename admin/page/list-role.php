<?php
include 'connect.php';
include './header.php';
?>

<div id="main-content-wp" class="list-post-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php' ?>
          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Danh sách Role</h3>
                         <a href="?page=add-role" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <div class="table-responsive">
                              <table class="table list-table-wp">
                                   <thead>
                                        <tr>
                                             <td><input type="checkbox" name="checkAll" id="checkALL"></td>
                                             <td class="thead-text"><span>STT</span></td>
                                             <td class="thead-text"><span>Tên Role</span></td>
                                             <td class="thead-text"><span></span></td>
                                             <td class="thead-text"><span>Role User</span></td>
                                             <td class="thead-text"><span></span></td>
                                             <td class="thead-text"><span></span></td>
                                             <td class="thead-text"><span></span></td>
                                             <td class="thead-text"><span></span></td>
                                             <td class="thead-text"><span></span></td>
                                             <td class="thead-text"><span>Thao tác</span></td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $sql = "SELECT * FROM role";

                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        $sn = 1;
                                        if ($count > 0) {
                                             while ($row = mysqli_fetch_assoc($res)) {
                                                  $role_id = $row['role_id'];
                                                  $role_name = $row['role_name'];
                                                  $role_user = $row['role_user'];
                                        ?>
                                        <tr>
                                             <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                             <td><span class="tbody-text"><?php echo $sn++; ?></h3></span>
                                             <td><span class="tbody-text"><?php echo $role_name; ?></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td><span class="tbody-text">
                                                       <?php
                                                                 if ($role_user == 0) {
                                                                      echo $role_user = "Quản trị viên";
                                                                 } elseif ($role_user == 1) {
                                                                      echo $role_user = "Khách hàng";
                                                                 } else {
                                                                      echo "Quyền không đúng";
                                                                 }
                                                                 ?>
                                                  </span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td class="clearfix">
                                                  <ul class="list-operation fl-left">
                                                       <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                      aria-hidden="true"></i></a></li>
                                                       <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash"
                                                                      aria-hidden="true"></i></a></li>
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