<?php
include '../admin/page/connect.php';
$q = $_REQUEST["q"];
//  var_dump($q);
// die();
$sql2 = "SELECT * FROM product WHERE name LIKE '%$q%'";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
$row2 = mysqli_fetch_assoc($res2);
foreach ($res2 as $key => $value) :
  echo '<div class="row wrapper_s">';
  echo '<img class="s_img" src=" ' . $value['img']  . '" />';
  echo '<a href="?page=detail_product&id=' . $value['product_id'] . '">';
  echo ' ' . $value['name'] . '';
  echo '</a>';
  echo '<div class="s_price">';
  echo '' . $value['price']  . ' đ';
  echo '</div>';
  echo '</div>';
endforeach;