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
          // session_start();
          $_SESSION['login'] = $user_phone;
          $sql2 = "SELECT * FROM user WHERE user_phone = " . $_SESSION['login'];
          $res2 = mysqli_query($conn, $sql2);
          $row = mysqli_fetch_assoc($res2);
          $name = $row['user_name'];
          $user_id = $row['user_id'];
          $_SESSION['user_id'] = $user_id;
          $_SESSION['role_user'] = $row['role_user'];

          // if (isset($_SESSION['login'])) {
          if ($row['role_user'] == 0) {
               echo "<script type='text/javascript'> window.location.assign('?page=list-user'); localStorage.setItem('name', '" . $name . "');</script>";
          } else {
               echo "<script type='text/javascript'> window.location.assign('../?page=home&user_id=${user_id}'); localStorage.setItem('name', '" . $name . "');localStorage.setItem('user_id', '" . $user_id . "');</script>";
          }
          // }
     } else {
          // echo "<script type='text/javascript'> window.location.assign('?page=login')</script>";
          $_SESSION['error'] = "Sai số điện thoại hoặc mật khẩu";
     }
     // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Trang đăng nhập</title>
     <link rel="stylesheet" href="./css/login.css">
     <link rel="stylesheet" href="./css/style-login.css">

     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">

     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
     <style type="text/css">
     body,
     html {
          width: 100% !important;
          margin: 0px !important;
          padding: 0px !important;
          overflow-x: hidden !important;
     }
     </style>
</head>

<body>
     <div class="login_body container">
          <div class="row">
               <div class="login_form col-md-6">
                    <h1 class="display-5"
                         style="font-weight: 150; border-bottom: 1px solid #FFF; padding-bottom: 12px;">Đăng nhập</h1>

                    <form action="?page=login" method="POST">
                         <div class="form-group">
                              <label>Số điện thoại</label>
                              <input type="number" name="user_phone" class="form-control"
                                   placeholder="Vui lòng nhập số điện thoại" require>
                         </div>

                         <div class="form-group">
                              <label>Mật khẩu</label>
                              <input type="text" name="password" class="form-control"
                                   placeholder="Vui lòng nhập số mật khẩu">
                         </div>
                         <input type="submit" value="Đăng nhập" name="submit" class="btn btn-info mb-3">
                         <p class="float-right">Bạn chưa có tài khoản?<a href="?page=register"> Đăng kí</a></p>
                    </form>
                    <div style="font-size:15px;text-align: center; color:red; margin-top:10px 0px 30px 0px;">
                         <?php if (isset($_SESSION['error'])) {
                              echo  $_SESSION['error'];
                              unset($_SESSION['error']);
                         } ?>
                    </div>
               </div>
          </div>
     </div>
</body>

</html>