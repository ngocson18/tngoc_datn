<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $prod_id = $_POST['prod_id'];
  $name = $_POST['name'];
  $new_price = $_POST['new_price'];
  $img = $_POST['img'];
  $sql12 =  "INSERT INTO cart(name, prod_id, price, quantity, user_id, img ) VALUES ('$name', '$prod_id','$new_price', '1', '$user_id', '$img')";
  $res12 = mysqli_query($conn, $sql12);
  // $count12 = mysqli_num_rows($res12);
?>
