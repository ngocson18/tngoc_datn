<?php
include 'connect.php';

if (isset($_POST['submit'])) {
     $user_phone = $_POST['user_phone'];

     $password = $_POST['password'];

     $sql = "SELECT * FROM user WHERE user_phone = '$user_phone' AND password = '$password'";

     $res = mysqli_query($conn, $sql);

     $count = mysqli_num_rows($res);

     // var_dump($count);
     // die();

     if ($count == 1) {
          $_SESSION['login'] = $user_phone;
          $sql2 = "SELECT * FROM user WHERE user_phone = " . $_SESSION['login'];
          // $user_name = "<script>localStorage.setItem('user_name', $row['user_name']);</script>";
          $res2 = mysqli_query($conn, $sql2);

          $row = mysqli_fetch_assoc($res2);

          if ($row['role_user'] == 0) {
               echo "<script type='text/javascript'> window.location.assign('?page=list-user')</script>";
          } else {
               echo "<script type='text/javascript'> window.location.assign('../?page=home')</script>";
          }
     } else {
          echo "<script type='text/javascript'> window.location.assign('?page=login')</script>";
          $_SESSION['error'] = "Sai số điện thoại hoặc mật khẩu";
     }
}
