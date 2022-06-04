<?php
  include '../admin/page/connect.php';
  $user_id = $_GET['user_id'];
  $total_money = $_POST['total_money'];
  $idArr = $_POST['idArr'];
  $numArr = $_POST['numArr'];
  $sql =  "INSERT INTO bepcuangoc.order(user_id, status, total_money) VALUES ('$user_id', 0,'$total_money')";
  $res = mysqli_query($conn, $sql);
  // $sql2 = "SELECT * FROM or"
  for( $i = 0; $i < $idArr.length; $i ++) {
    $sql2 =  "INSERT INTO bepcuangoc.order_details(order_id, quantity, product_id) VALUES ('$user_id', '$numArr[$i]','$idArr[$i]')";
  };
?>
