<?php
    include 'connect.php';
    $value = $_POST['value'];
    $order_id = $_POST['order_id'];
    $updateSql = "UPDATE bepcuangoc.order SET status = '$value' WHERE order_id = '$order_id'";
    $resUpdate = mysqli_query($conn, $updateSql);
    echo "success";
?>
