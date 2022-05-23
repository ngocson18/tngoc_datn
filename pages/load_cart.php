<?php
  include './admin/page/connect.php';
  // $user_id = "<script type='text/javascript'>localStorage.getItem('user_id')</script>";
  $sql2 = "SELECT * FROM cart WHERE user_id = 53";
  $res2 = mysqli_query($conn, $sql2);
  $count2 = mysqli_num_rows($res2);
?>
