<?php
    include 'connect.php';
    $value = $_POST['date'];
    $sql5 = "SELECT  COUNT(order_id) as sodondagiao  FROM bepcuangoc.order WHERE created_at = '$value' AND status = 5";
    $sql4 = "SELECT  COUNT(order_id) as sodonhoan  FROM bepcuangoc.order WHERE created_at = '$value' AND status = 4";
    $sql3 = "SELECT  COUNT(order_id) as sodonhuy  FROM bepcuangoc.order WHERE created_at = '$value' AND status = 3";
    $sql2 = "SELECT  COUNT(order_id) as sodondanggiao  FROM bepcuangoc.order WHERE created_at = '$value' AND status = 2";
    $sql1 = "SELECT  COUNT(order_id) as sodondaxacnhan FROM bepcuangoc.order WHERE created_at = '$value' AND status = 1";
    $sql0 = "SELECT  COUNT(order_id) as sodonmoi FROM bepcuangoc.order WHERE created_at = '$value' AND status = 0";

    $result5 = mysqli_query($conn, $sql5);
    $result4 = mysqli_query($conn, $sql4);
    $result3 = mysqli_query($conn, $sql3);
    $result2 = mysqli_query($conn, $sql2);
    $result1 = mysqli_query($conn, $sql1);
    $result0 = mysqli_query($conn, $sql0);
    $row5 = mysqli_fetch_assoc($result5);
    $row4 = mysqli_fetch_assoc($result4);
    $row3 = mysqli_fetch_assoc($result3);
    $row2 = mysqli_fetch_assoc($result2);
    $row1 = mysqli_fetch_assoc($result1);
    $row0 = mysqli_fetch_assoc($result0);

    echo '<span>Số đơn hàng đã giao:</span>';
    echo '<span class="ml-3">'. $row5['sodondagiao'] . ' Đơn</span> <br />';
    echo '<span>Số đơn hoàn:</span>';
    echo '<span class="ml-3">'. $row4['sodonhoan'] . ' Đơn</span> <br />';
    echo '<span>Số đơn hủy:</span>';
    echo '<span class="ml-3">'. $row3['sodonhuy'] . ' Đơn</span> <br />';
    echo '<span>Số đơn hàng đang giao:</span>';
    echo '<span class="ml-3">'. $row2['sodondanggiao'] . ' Đơn</span> <br />';
    echo '<span>Số đơn hàng đã xác nhận:</span>';
    echo '<span class="ml-3">'. $row1['sodondaxacnhan'] . ' Đơn</span> <br />';
    echo '<span>Số đơn hàng mới:</span>';
    echo '<span class="ml-3">'. $row0['sodonmoi'] . ' Đơn</span> <br />';
?>
