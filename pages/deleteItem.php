<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $prod_id = $_POST['prod_id'];

  $sql12 = "DELETE FROM cart WHERE user_id = '$user_id' AND prod_id = '$prod_id'";
  $res12 = mysqli_query($conn, $sql12);
  // $count12 = mysqli_num_rows($res12);
?>
