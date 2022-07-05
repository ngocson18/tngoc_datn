<?php
include 'connect.php';
$role = $_POST['role'];
// var_dump($role);
// die();
if ($role != '') {
     if ($role == 0) {
          $sql = "SELECT * FROM bepcuangoc.user WHERE role_user = 1";
     }
     if ($role == 1) {
          $sql = "SELECT * FROM bepcuangoc.user WHERE role_user = 2";
     }
     if ($role == 2) {
          $sql = "SELECT * FROM bepcuangoc.user";
     }
}
$result = mysqli_query($conn, $sql);
$n = 1;
foreach ($result as $key => $value) :
     switch ($value['role_user']) {
          case 0:
               $userText = 'Quản trị viên';
               break;
          case 1:
               $userText = 'Khách hàng';
               break;
     }
     echo '<tr>';
     echo '<td><span class="tbody-text">' . $n++ . '</span></td>';
     echo '<td><span class="tbody-text">' . $value['user_name'] . '</span></td>';
     echo '<td><span class="tbody-text">' . $value['password'] . '</span></td>';
     echo '<td><span class="tbody-text">' . $value['user_address'] . '</span></td>';
     echo '<td><span class="tbody-text">' . $value['user_phone'] . '</span></td>';
     echo '<td><span class="tbody-text">' . $value['user_email'] . '</span></td>';
     echo '<td><span class="tbody-text">' . $userText . '</span></td>';
     echo '<td>
          <ul class="list-operation fl-left">
               <li><a href="?page=update-user&id= ' . $value['user_id'] . '" title="Sửa" class="edit"><i
                    class="fa fa-pencil" aria-hidden="true"
                    style="font-size: 20px; margin-bottom: 10px; padding-bottom: 10px ;"></i></a>
               </li>
               <li><a href="?page=list-user&id= ' . $value['user_id'] . '" title="Xóa" class="delete"><i
                    class="fa fa-trash" aria-hidden="true" style="font-size: 20px;"></i></a>
               </li>
               </ul>
          </td>';
     echo '</tr>';
endforeach;