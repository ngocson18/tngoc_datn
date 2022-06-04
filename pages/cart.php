<?php
include './admin/page/connect.php';
?>
<div id="main-content-wp" class="cart-page">
     <div id="wrapper" class="wp-inner clearfix">
          <div class="section" id="info-cart-wp">
               <div class="section-detail table-responsive">
                    <table class="table">
                         <thead>
                              <tr>
                                   <td>Ảnh sản phẩm</td>
                                   <td>Tên sản phẩm</td>
                                   <td>Giá sản phẩm</td>
                                   <td>Số lượng</td>
                                   <td colspan="2">Thành tiền</td>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                                   $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                   $parts = parse_url($url);
                                   parse_str($parts['query'], $query);
                                   $user_id = $query['user_id'];
                                   $sql = "SELECT * FROM cart WHERE user_id = '$user_id' GROUP BY name";

                                   $res = mysqli_query($conn, $sql);
                                   $count = mysqli_num_rows($res);
                                   $total = 0;
                                   if ($count > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                             $img = $row['img'];
                                             $name = $row['name'];
                                             $price = $row['price'];
                                             $priceDisplay = number_format($row['price']);
                                             $id = $row['id'];
                                             $total = $total + $price;
                                             // $temp = $total;
                                             // $totalDisplay = number_format($total);
                              ?>
                              <tr>

                                   <td>
                                        <a href="" title="" class="thumb">
                                             <img style="width: 150px; height: 100px" src="<?= $img ?>" alt="">
                                        </a>
                                   </td>
                                   <td>
                                        <div><?= $name ?></div>
                                   </td>
                                   <td id="price<?= $id ?>"><?= $price ?></td>
                                   <td>
                                        <input class="prod-id" style="display: none" value="<?=$id ?>" />
                                        <input onChange="changePrice(this.value, <?= $id ?>)" type="text" name="num-order" value="1" class="num-order">
                                   </td>
                                   <td class="priceTotal" id="total<?= $id ?>">
                                        <?= $price ?>
                                   </td>
                                   <td>
                                        <a href="" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                   </td>
                              </tr>
                              <?php
                                   }
                              }
                              ?>
                         </tbody>
                         <tfoot>
                              <tr>
                                   <td colspan="7">
                                        <div class="clearfix">
                                             <p id="total-price" class="fl-right">Tổng giá: <span id="allPrice"><?= $total ?></span> <span>đ</span></p>
                                        </div>
                                   </td>
                              </tr>
                              <tr>
                                   <td colspan="7">
                                        <div class="clearfix">
                                             <div class="fl-right">
                                                  <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                                  <a onClick="thanhtoan()" title="" id="checkout-cart">Thanh toán</a>
                                             </div>
                                        </div>
                                   </td>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>
          <div class="section" id="action-cart-wp">
               <div class="section-detail">
                    <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
               </div>
          </div>
     </div>
</div>
