<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $new_price = $_POST['new_price'];
  $img = $_POST['img'];
  $sql12 =  "INSERT INTO cart(name, price, img ,quantity, user_id) VALUES ('$name', '$new_price','$img', 1, $user_id)";
  $res12 = mysqli_query($conn, $sql12);
  // $count12 = mysqli_num_rows($res12);
?>
