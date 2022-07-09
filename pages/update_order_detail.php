<?php
include '../admin/page/connect.php';
$user_id = $_POST['user_id'];
$prod_id = $_POST['prod_id'];
$order_id = $_POST['order_id'];
$quantity = $_POST['quantity'];
$created_at =  date('Y-m-d');

$sql2 =  "INSERT INTO bepcuangoc.order_details(order_id, quantity, product_id, created_at) VALUES ('$order_id', '$quantity', '$prod_id', '$created_at')";
$res2 = mysqli_query($conn, $sql2);

$sqlSelect = "SELECT * FROM bepcuangoc.product WHERE product_id = '$prod_id'";

$resForSelect = mysqli_query($conn, $sqlSelect);
$row = mysqli_fetch_assoc($resForSelect);
$quantityStart = $row['quantity'];
$newQUan = $quantityStart - $quantity;
$sqlUpdate = "UPDATE Product SET
               quantity = '$newQUan'
               WHERE product_id = $prod_id
          ";
$resUpdateQuanity = mysqli_query($conn, $sqlUpdate);
echo '' . $newQUan . '';