<?php
include 'connect.php';
$err = [];

if (isset($_POST['user_name'])) {
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $user_phone = $_POST['user_phone'];
     $user_address = $_POST['user_address'];
     $password = $_POST['password'];
     $rPassword = $_POST['rPassword'];
     $role_user = $_POST['role_user'];
     $role_user = 1;

     if (empty($user_name)) {
          $err['user_name'] = 'Bạn chưa nhập tên.';
     }
     if (empty($user_email)) {
          $err['user_email'] = 'Bạn chưa nhập email.';
     }
     if (empty($user_phone)) {
          $err['user_phone'] = 'Bạn chưa nhập số điện thoại.';
     }
     if (empty($user_address)) {
          $err['user_address'] = 'Bạn chưa nhập địa chỉ.';
     }
     if (empty($password)) {
          $err['password'] = 'Bạn chưa nhập mật khẩu.';
     }
     if ($password != $rPassword) {
          $err['rPassword'] = 'Mật khẩu nhập lại không đúng! Vui lòng nhập lại.';
     }
     // var_dump(!empty($err));
     // die();
     if (empty($err)) {
          $sql = "INSERT INTO user(user_name, user_email, user_phone, user_address, password, role_user) VALUES ('$user_name', '$user_email', '$user_phone', '$user_address', '$password', '$role_user')";
          $res = mysqli_query($conn, $sql);
          if ($res) {
               header('location: ?page=login');
          }
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Trang đăng kí</title>
     <link rel="stylesheet" href="./css/login.css">
     <link rel="stylesheet" href="./css/style-login.css">

     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

     .has-error {
          color: red;
     }
     </style>
</head>

<body>
     <div class="login_body container">
          <div class="row">
               <div class="login_form col-md-6">
                    <h1 class="display-5"
                         style="font-weight: 150; border-bottom: 1px solid #FFF; padding-bottom: 12px;">Đăng ký</h1>
                    <form action="" method="POST">
                         <div class="form-group">
                              <label>Họ và tên</label>
                              <input type="text" name="user_name" class="form-control" placeholder="Vui lòng nhập tên"
                                   require>
                              <div class="has-error">
                                   <span><?php echo (isset($err['user_name'])) ? $err['user_name'] : '' ?></span>
                              </div>
                         </div>

                         <div class="form-group">
                              <label>Số điện thoại</label>
                              <input type="number" name="user_phone" class="form-control"
                                   placeholder="Vui lòng nhập số điện thoại" require>
                              <div class="has-error">
                                   <span><?php echo (isset($err['user_phone'])) ? $err['user_phone'] : '' ?></span>
                              </div>

                         </div>

                         <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="user_email" class="form-control"
                                   placeholder="Vui lòng nhập Email" require>
                              <div class="has-error">
                                   <span><?php echo (isset($err['user_email'])) ? $err['user_email'] : '' ?></span>
                              </div>

                         </div>

                         <div class="form-group">
                              <label>Địa chỉ</label>
                              <input type="text" name="user_address" class="form-control"
                                   placeholder="Vui lòng nhập địa chỉ" require>
                              <div class="has-error">
                                   <span><?php echo (isset($err['user_address'])) ? $err['user_address'] : '' ?></span>
                              </div>
                         </div>
                         <div class="form-group" style="display: none;">
                              <label>Quyền</label>
                              <input type="text" name="role_user" class="form-control" require>
                         </div>

                         <div class=" form-group">
                              <label>Mật khẩu</label>
                              <input type="password" name="password" class="form-control"
                                   placeholder="Vui lòng nhập mật khẩu">
                              <div class="has-error">
                                   <span><?php echo (isset($err['password'])) ? $err['password'] : '' ?></span>
                              </div>

                         </div>

                         <div class="form-group">
                              <label>Nhập lại mật khẩu</label>
                              <input type="password" name="rPassword" class="form-control"
                                   placeholder="Vui lòng nhập mật khẩu">
                              <div class="has-error">
                                   <span><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : '' ?></span>
                              </div>
                         </div>
                         <input type="submit" value="Đăng kí" name="submit" class="btn btn-info mb-3">
                         <a href="?page=login" class="float-right">Đăng nhập</a>
                    </form>
                    <div style="font-size:15px;text-align: center; color:red; margin-top:10px 0px 30px 0px;">

                    </div>
               </div>
          </div>
     </div>
</body>

</html>