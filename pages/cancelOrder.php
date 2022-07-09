<?php
include '../admin/page/connect.php';
$order_id = $_POST['order_id'];
$sqlUpdate = "UPDATE bepcuangoc.order SET status = 3 WHERE order_id = $order_id";
$resUpdateQuanity = mysqli_query($conn, $sqlUpdate);
echo 'success';