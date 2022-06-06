<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $total_money = $_POST['total_money'];
  $prod_id = $_POST['prod_id'];
  $num = $_POST['num'];
  
  $created_at =  date('Y-m-d');
  $updateSql = "UPDATE cart SET  quantity = '$num' WHERE user_id = '$user_id' AND id = '$prod_id'";
  $resUpdate = mysqli_query($conn, $updateSql);
  // $sql =  "INSERT INTO bepcuangoc.order(user_id, status, total_money, created_at) VALUES ('$user_id', 0,'$total_money', '$created_at')";
  // $res = mysqli_query($conn, $sql);

  // $sql2 =  "INSERT INTO bepcuangoc.order_details(order_id, quantity, product_id, created_at) VALUES ('$user_id', '$numArr[$i]', '$idArr[$i]', '$created_at')";
  // $res2 = mysqli_query($conn, $sql2);
?>
