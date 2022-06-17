<?php
    include 'connect.php';
    $status = $_POST['status'];
    $datePicker = $_POST['datePicker'];
    if($datePicker != '') {
      $sql = "SELECT * FROM bepcuangoc.order WHERE status = '$status' AND created_at = '$datePicker'";
    } else {
      $sql = "SELECT * FROM bepcuangoc.order WHERE status = '$status'";
    }

    $res = mysqli_query($conn, $sql);
      $result = mysqli_query($conn, $sql);
      $n = 1;
        foreach ($result as $key => $value):
          switch ($value['status']) {
            case 0:
                $statusText = 'Đã đặt hàng';
                break;
            case 1:
              $statusText = 'Đã xác nhận đơn hàng';
                break;
            case 2:
              $statusText = 'Đang giao';
                break;
            case 3:
              $statusText = 'Huỷ đơn';
                break;
            case 4:
              $statusText = 'Đơn hoàn';
                break;
            case 5:
              $statusText = 'Đã giao';
                break;
            default:
            $statusText = 'Đag xác nhận';
          }
          echo '<tr>';
          echo '<td><span class="tbody-text">' . $n++ .'</span></td>';
          echo '<td><span class="tbody-text">' . $value['order_id'] .'</span></td>';
          echo '<td><span class="tbody-text tb-title fl-left"> '.$value['name'].'</span></td>';
          echo '<td><span class="tbody-text">'. $value['total_money'].'</span></td>';
          echo '<td><span class="tbody-text">'. $statusText.'</span></td>';
          echo '<td><span class="tbody-text">'. $value['created_at'].'</span></td>';
          echo '<td><span class="tbody-text">'. $value['phone'].'</span></td>';
          echo '<td><span class="tbody-text">'. $value['address'].'</span></td>';
          echo '<td><a href="?page=detail-order&order_id=' .$value['order_id'] .'">Chi tiết</a></td>
               ';
          echo '</tr>';
      endforeach;
?>
