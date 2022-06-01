<?php
  include '../admin/page/connect.php';
  // $user_id = 53;
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
  $total = 0;
  parse_str($parts['query'], $query);
  $user_id = $query['user_id'];
  
  // $user_id = $_REQUEST['user_id'];
  $sql2 = "SELECT * FROM cart WHERE user_id = '$user_id'";
  $res2 = mysqli_query($conn, $sql2);
  $count2 = mysqli_num_rows($res2);
  while ($row = mysqli_fetch_assoc($res2)) { // Important line !!! Check summary get row on array ..
    // foreach ($row as $field => $value) { 
      $total += $row['price'];
      echo "<li class='clearfix'>";
      echo "<a href='' title='' class='thumb fl-left'>";
      echo "<img src=' " . $row['img'] ."' alt='' />";
      echo "</a>";
      echo "<div class='info fl-right'>";
      echo "<a href='' title='' class='product-name'>". $row['name'] ."</a>";
      echo "<p class='price-cart' style='display: inline-block; color: #000'>" . $row['price'] ."</p> <span style='color: #000'>đ</span>";
      echo "<p class='qty'>Số lượng: <span>" . '1' . "</span></p>";
      echo "</div>";
      echo "</li>";
    // }
  }
?>
