<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $new_price = $_POST['new_price'];
  $sql =  "INSERT INTO cart(name, price ,quantity, user_id) VALUES ('$name', '$new_price', 1, $user_id)";
  $res = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);