<?php 
     include 'connect.php';

     $err = [];

     if(isset($_POST['username'])){
          $username = $_POST['username'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $fullname = $_POST['fullname'];
          $password = $_POST['password'];
          $rPassword = $_POST['rPassword'];
          $id_role = $_POST['id_role'];

          if(empty($username)){
               $err['username'] = 'Ban chua nhap ten';
          }
          if(empty($email)){
               $err['email'] = 'Ban chua nhap email';
          }
          if(empty($fullname)){
               $err['fullname'] = 'Ban chua nhap fullname';
          }
          if(empty($address)){
               $err['address'] = 'Ban chua nhap address';
          }
          if(empty($phone)){
               $err['phone'] = 'Ban chua nhap sdt';
          }
          if(empty($password)){
               $err['password'] = 'Ban chua nhap mat khau';
          }
          if($password != $rPassword){
               $err['rPassword'] = 'Mat khau nhap lai khong dung';
          }
          // var_dump(empty($err)); 

          if(empty($err)){
               // password_hash(string, PASSWORD_DEFAULT);
               $pass = password_hash($password, PASSWORD_DEFAULT);
               // var_dump($pass);
               // die();
               $id_role = 1;
               $sql =  "INSERT INTO user(username,email,phone,address,fullname,password,id_role) VALUES ('$username','$email','$phone','$address','$fullname','$pass','$id_role')";
     
               $res = mysqli_query($conn, $sql);
               if($res){
                    header('location: ?page=login');
               }
          }
          // die();
          
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Đăng kí tài khoản</title>
     <link rel="stylesheet" href="style.css">
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

     <style>
     .has-error {
          color: red;
     }
     </style>
</head>

<body>
     <div class="container">
          <div class="row">
               <div class="col-md-6">
                    <form action="" method="POST">
                         <legend>Dang ki tai khoan</legend>
                         <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="username">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['username']))?$err['username']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="email">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['email']))?$err['email']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="">Full name</label>
                              <input type="text" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="fullname">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['fullname']))?$err['fullname']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="">Phone</label>
                              <input type="text" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="phone">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['phone']))?$err['phone']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="">address</label>
                              <input type="text" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="address">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['address']))?$err['address']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <div class=" form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="password">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['password']))?$err['password']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <div class=" form-group">
                              <label for="">Password x2</label>
                              <input type="password" class="form-control" placeholder="Vui long dien day du thong tin"
                                   name="rPassword">
                              <div class="has-error">
                                   <span>
                                        <?php 
                                             echo (isset($err['rPassword']))?$err['rPassword']:''
                                        ?>
                                   </span>
                              </div>
                         </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
          </div>
     </div>
</body>

</html>