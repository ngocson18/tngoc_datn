<?php
  include '../admin/page/connect.php';
  $user_id = 53;
  // $user_id = $_POST['user_id'];
  $sql2 = "SELECT * FROM cart WHERE user_id = '$user_id'";
  $res2 = mysqli_query($conn, $sql2);
  $count2 = mysqli_num_rows($res2);
  while ($row = mysqli_fetch_assoc($res2)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { 
      echo "<li class='clearfix'>";
      echo "<a href='' title='' class='thumb fl-left'>";
      echo "<img src=' " . $row['img'] ."' alt='' />";
      echo "</a>";
      echo "<div class='info fl-right'>";
      echo "<a href='' title='' class='product-name'>". $row['name'] ."</a>";
      echo "<p class='price'>" . $row['price'] ."đ</p>";
      echo "<p class='qty'>Số lượng: <span>" . '1' . "</span></p>";
      echo "</div>";
      echo "</li>";
    }
  }
?>
