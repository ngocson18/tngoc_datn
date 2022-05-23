<?php 
     include 'connect.php';
     include './header.php';
?>
<!-- DELETE -->
<?php 
     if(isset($_GET['id'])){
          $id = $_GET['id'];

          $sql1 = "DELETE FROM category WHERE category_id = $id";

          $res1= mysqli_query($conn, $sql1);
          if($res1 === TRUE){
               echo "Add User Successfully";
               echo "<script type='text/javascript'> window.location.assign('?page=list-categories-product')</script>";
          }else{
               echo "Error: ".$sql.":-".mysqli_error($conn);
          }
     }
?>
<div id="main-content-wp" class="list-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>
          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                         <a href="?page=add-category" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
               </div>
               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <div class="table-responsive">
                              <table class="table list-table-wp">
                                   <thead>
                                        <tr>
                                             <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                             <td><span class="thead-text">STT</span></td>
                                             <td><span class="thead-text">Tên danh mục</span></td>
                                             <td><span class="thead-text">Thời gian tạo</span></td>
                                             <td><span class="thead-text">Thời gian tạo</span></td>
                                             <td><span class="thead-text"></span></td>
                                             <td><span class="thead-text"></span></td>
                                             <td><span class="thead-text"></span>Thao tác</td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                   <tbody>
                                        <?php 
                                             $sql = "SELECT * FROM category";

                                             $res = mysqli_query($conn, $sql);

                                             $count = mysqli_num_rows($res);

                                             $sn = 1;
                                             if($count > 0){
                                                  while($row = mysqli_fetch_assoc($res)){
                                                       $category_id = $row['category_id'];
                                                       $name = $row['name'];
                                                       $created_at = $row['created_at'];
                                                       $updated_at = $row['updated_at'];
                                                       // $name = $row['name'];
                                                       ?>
                                        <tr>
                                             <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                             <td><span class="tbody-text"><?php echo $sn++ ; ?></h3></span>
                                             <td><span class="tbody-text"><?php echo $name; ?></span></td>
                                             <td><span class="tbody-text"><?php echo $created_at; ?></span></td>
                                             <td><span class="tbody-text"><?php echo $updated_at; ?></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td><span class="tbody-text"></span></td>
                                             <td class="clearfix">
                                                  <ul class="list-operation fl-left">
                                                       <li><a href="?page=update-category&id=<?= $category_id;?>"
                                                                 title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                      aria-hidden="true"></i></a>
                                                       </li>
                                                       <li><a href="?page=list-categories-product&id=<?= $category_id;?>"
                                                                 title="Xóa" class="delete"><i class="fa fa-trash"
                                                                      aria-hidden="true"></i></a></li>
                                                  </ul>
                                             </td>
                                        </tr>
                                        <?php
                                                  }
                                             }
                                        ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
               <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                         <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                         <ul id="list-paging" class="fl-right">
                              <li>
                                   <a href="" title="">
                                        < </a>
                              </li>
                              <li>
                                   <a href="" title="">1</a>
                              </li>
                              <li>
                                   <a href="" title="">2</a>
                              </li>
                              <li>
                                   <a href="" title="">3</a>
                              </li>
                              <li>
                                   <a href="" title="">></a>
                              </li>
                         </ul>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php 
     include './footer.php';
?>