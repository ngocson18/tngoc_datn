<?php
include 'connect.php';
$cate = $_POST['cate'];
$price = $_POST['price'];
if ($price == '' && $cate != '') {
  $sql = "SELECT * FROM bepcuangoc.product WHERE category = '$cate'";
}
if ($price != '' && $cate != '') {
  if ($price == 0) {
    $sql = "SELECT * FROM bepcuangoc.product WHERE category = '$cate' AND price < 10000";
  }
  if ($price == 1) {
    $sql = "SELECT * FROM bepcuangoc.product WHERE category = '$cate' AND price >= 10000 AND price <= 50000";
  }
  if ($price == 2) {
    $sql = "SELECT * FROM bepcuangoc.product WHERE category = '$cate' AND price > 50000";
  }
};
if ($cate == '' && $price != '') {
  if ($price == 0) {
    $sql = "SELECT * FROM bepcuangoc.product WHERE price < 10000";
  }
  if ($price == 1) {
    $sql = "SELECT * FROM bepcuangoc.product WHERE price >= 10000 AND price <= 50000";
  }
  if ($price == 2) {
    $sql = "SELECT * FROM bepcuangoc.product WHERE price > 50000";
  }
}

$res = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);
$n = 1;
foreach ($result as $key => $value) :
  switch ($value['category']) {
    case 1:
      $cateText = 'Đồ ăn vặt Việt Nam';
      break;
    case 2:
      $cateText = 'Đồ ăn vặt Hàn QUốc';
      break;
    case 3:
      $cateText = 'Đồ ăn vặt Thái Lan';
      break;
    case 4:
      $cateText = 'Đồ ăn vặt khác';
      break;
    case 5:
      $cateText = 'Đồ uống';
      break;
    case 6:
      $cateText = 'Bánh Ngọt';
      break;
    default:
      $cateText = 'Đag xác nhận';
  }
  $value['new_price'] = $value['price'] - $value['price'] * $value['discount'] / 100;
  // var_dump($value['new_price']);
  // die();
  echo '<tr>';
  echo '<td><span class="tbody-text">' . $n++ . '</span></td>';
  echo '<td><span class="tbody-text">' . $value['name'] . '</span></td>';
  echo '<td><span class="tbody-text tb-title fl-left"> ' . $value['title'] . '</span></td>';
  echo '<td style="width : 200px;"><span class="tbody-text">' . $value['description'] . '</span></td>';
  echo '<td><span class="tbody-text">' . $cateText . '</span></td>';
  echo '<td><span class="tbody-text">' . $value['price'] . '</span> vnđ</td>';
  echo '<td><span class="tbody-text">' . $value['quantity'] . '</span></td>';
  echo '<td><span class="tbody-text">' . $value['discount'] . '</span><span>%</span></td>';
  echo '<td><span class="tbody-text">' . $value['new_price'] . '</span> vnđ</td>';
  echo '<td><span class="tbody-text"><div><img style="width:300px; height: 150px;object-fit: cover;" src="../' . $value['img'] . '"></div></span></td>';
  echo '<td>
            <ul class="list-operation fl-left">
                <li><a href="?page=update-product&id= ' . $value['product_id'] . '" title="Sửa" class="edit"><i
                      class="fa fa-pencil" aria-hidden="true"
                      style="font-size: 20px; margin-bottom: 10px; padding-bottom: 10px ;"></i></a>
                </li>
                <li><a href="?page=list-product&id= ' . $value['product_id'] . '" title="Xóa" class="delete"><i
                      class="fa fa-trash" aria-hidden="true" style="font-size: 20px;"></i></a>
                </li>
              </ul>
          </td>';
  echo '</tr>';
endforeach;