<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $prod_id = $_POST['prod_id'];
  $order_id = $_POST['order_id'];
  $quantity = $_POST['quantity'];
  $created_at =  date('Y-m-d');

  $sql2 =  "INSERT INTO bepcuangoc.order_details(order_id, quantity, product_id, created_at) VALUES ('$order_id', '$quantity', '$prod_id', '$created_at')";
  $res2 = mysqli_query($conn, $sql2);
?>
