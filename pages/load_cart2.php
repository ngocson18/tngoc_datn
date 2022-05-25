<?php
  include '../admin/page/connect.php';
  $user_id = 36;
  // $user_id = $_POST['user_id'];
  $sql2 = "SELECT * FROM cart WHERE user_id = '$user_id'";
  $res2 = mysqli_query($conn, $sql2);
  $count2 = mysqli_num_rows($res2);
?>
