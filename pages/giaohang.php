<?php
  include '../admin/page/connect.php';
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $updateSql = "UPDATE bepcuangoc.order SET status = '1', name = '$name', phone = '$phone', email = '$email', address = '$address'  WHERE user_id = '$user_id'";
  $deleteSQL = "DELETE FROM cart WHERE user_id = '$user_id'";
  $resUpdate = mysqli_query($conn, $updateSql);
  $resDelete = mysqli_query($conn, $deleteSQL);
?>
