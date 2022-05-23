<div id="main-content-wp" class="list-product-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php'; ?>

          <div id="content" class="fl-right">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 class="fl-left" id="index">Danh sách đơn hàng</h3>
                    </div>
               </div>

               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <div class="clearfix filter-wp">
                              <ul class="post-status fl-left">
                                   <li class="all"><a href="">Tất cả <span class="count">(10)</span></a> |</li>
                                   <li class="publish"><a href="">Đã kiểm tra <span class="count">(5)</span></a> |
                                   </li>
                                   <li class="pending"><a href="">Chờ xét duyệt <span class="count">(2)</span></a> |
                                   </li>
                                   <li class="trash"><a href="">Đã Xóa <span class="count">(2)</span></a></li>
                              </ul>
                              <form action="" method="get" class="form-s fl-right">
                                   <input type="text" name="s" id="s">
                                   <input type="submit" name="sm_s" value="Tìm kiếm">
                              </form>
                         </div>
                         <div class="actions">
                              <form action="" class="form-actions" method="get">
                                   <select name="actions">
                                        <option value="0">Tác vụ</option>
                                        <option value="1">Chỉnh sửa</option>
                                        <option value="2">Bỏ vào thùng rác</option>
                                   </select>
                                   <input type="submit" name="sm_action" value="Áp dụng">
                              </form>
                         </div>
                         <div class="table-responsive">
                              <table class="table list-table-wp">
                                   <thead>
                                        <tr>
                                             <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                             <td><span class="thead-text">STT</span></td>
                                             <td><span class="thead-text">Mã đơn hàng</span></td>
                                             <td><span class="thead-text">Tên khách hàng</span></td>
                                             <td><span class="thead-text">Số lượng</span></td>
                                             <td><span class="thead-text">Tổng giá</span></td>
                                             <td><span class="thead-text">Trạng thái</span></td>
                                             <td><span class="thead-text">Thời gian</span></td>
                                             <td><span class="thead-text">Chi tiết</span></td>
                                             <td>Thao tác</td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr>
                                             <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                             <td><span class="tbody-text"> 1</span></td>
                                             <td><span class="tbody-text"> KB-1</span></td>
                                             <td><span class="tbody-text tb-title fl-left"> Nguyễn Tuấn Ngọc</span></td>
                                             <td><span class="tbody-text"> 1</span></td>
                                             <td><span class="tbody-text"> 1.000.000 vnđ</span></td>
                                             <td><span class="tbody-text"> Hoạt động</span></td>
                                             <td><span class="tbody-text"> 15/04/2022</span></td>
                                             <td>
                                                  <a href="?page=detail-order">Chi tiết</a>
                                             </td>
                                             <td>
                                                  <ul class="list-operation fl-left">
                                                       <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                      aria-hidden="true"></i></a></li>
                                                       <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash"
                                                                      aria-hidden="true"></i></a></li>
                                                  </ul>
                                             </td>
                                        </tr>
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