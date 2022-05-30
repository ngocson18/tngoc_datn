<?php
    include 'connect.php';
    $value = $_POST['value'];
    $a = $value .'-12-31' ;
    $b = $value . '-01-01';
    $sql = "SELECT * FROM bepcuangoc.order WHERE created_at <= '$a' AND created_at > '$b'";

    $sql11 = "SELECT SUM(total_money) AS value_sum FROM bepcuangoc.order WHERE created_at <= '$a' AND created_at > '$b'";

    $result6 = mysqli_query($conn, $sql);
    $result66 = mysqli_query($conn, $sql11);
    $row22 = mysqli_fetch_assoc($result66);
    $sum22 = $row22['value_sum'];
    foreach ($result6 as $key => $value):
      if($value['total_money'] > 0) {
        echo '<tr>';
        echo '<th>Tháng ' .($key + 1).'</th>';
        echo '<th>' .number_format($value['total_money']). ' đ'. '</th>';
        echo '<th>'.($value['total_money']/ $sum22) * 100 . '%' .'</th>';
        echo '</tr>';
      } 
    endforeach
?>
