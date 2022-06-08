<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $total_money = $_POST['total_money'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  // $email = $_POST['email'];
  // $address = $_POST['address'];
  
  $created_at =  date('Y-m-d');
  $sql =  "INSERT INTO bepcuangoc.order(user_id, status, total_money, created_at, name, phone) VALUES ('$user_id', 0,'$total_money', '$created_at', '$name', '$phone')";
  $res = mysqli_query($conn, $sql);
  $sql2 =  "SELECT * FROM bepcuangoc.order WHERE user_id = '$user_id'";
  $res2 = mysqli_query($conn, $sql2);
  while ($row2 = mysqli_fetch_assoc($res2)) {
    $order_id = $row2['order_id'];
  }
  echo "$order_id";
?>
