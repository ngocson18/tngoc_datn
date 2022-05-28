<?php
     session_start();
     include 'connect.php';
     if (isset($_POST['submit'])) {
          $user_phone = $_POST['user_phone'];

          $password = $_POST['password'];

          $sql = "SELECT * FROM user WHERE user_phone = '$user_phone' AND password = '$password'";

          $res = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if ($count == 1) {
               $_SESSION['login'] = $user_phone;
               $sql2 = "SELECT * FROM user WHERE user_phone = " . $_SESSION['login'];
               $res2 = mysqli_query($conn, $sql2);
               $row = mysqli_fetch_assoc($res2);
               $name = $row['user_name'];
               $user_id = $row['user_id'];
               $_SESSION['role_user'] = $row['role_user'];
               // var_dump($_SESSION['login']);
               // die();
               if (isset($_SESSION['login'])) {
                    if ($row['role_user'] == 0) {
                         echo "<script type='text/javascript'> window.location.assign('?page=list-user'); localStorage.setItem('name', '" . $name . "');</script>";
                    } else {
                         echo "<script type='text/javascript'> window.location.assign('../?page=home'); localStorage.setItem('name', '" . $name . "');localStorage.setItem('user_id', '" . $user_id . "');</script>";
                    }
               }
          } else {
               echo "<script type='text/javascript'> window.location.assign('?page=login')</script>";
               $_SESSION['error'] = "Sai số điện thoại hoặc mật khẩu";
          }
     }
?>
