<?php 
     include 'connect.php';
     include './header.php';
     
?>
<?php 
     $id = $_GET['id'];

     $sql = "SELECT * FROM category WHERE category_id = $id";

     $res = mysqli_query($conn, $sql);

     if(!$res){
          die("Không thể thực hiện câu lệnh SQL: ".mysqli_error($conn));
          exit();
     }

     while($row = mysqli_fetch_assoc($res)){
          $category_id = $row['category_id'];
          $name = $row['name'];
     }
// update
     if(isset($_POST['submit'])){
          $category_id = $_POST['category_id'];
          $name = $_POST['name'];

          $sql1 = "UPDATE category SET
               name = '$name'
               WHERE category_id = $category_id
          ";
          
          $res1 = mysqli_query($conn, $sql1);

          if($res1 === TRUE){
               echo "Add User Successfully";
               echo "<script type='text/javascript'> window.location.assign('?page=list-categories-product')</script>";
          }else{
               echo "Error: ".$sql.":-".mysqli_error($conn);
          }
     }
?>
<div id="main-content-wp" class="add-cat-page">
     <div class="wrap clearfix">
          <?php require './sidebar.php';?>
          <div id="content" class="fl-left">
               <div class="section" id="title-page">
                    <div class="clearfix">
                         <h3 id="index" class="fl-left">Add Role</h3>
                    </div>
               </div>

               <div class="section" id="detail-page">
                    <div class="section-detail">
                         <form action="" method="POST">
                              <label for="title">Category ID:</label>
                              <input type="text" name="category_id" id="title" value="<?php echo $category_id; ?>"
                                   readonly>
                              <label for="title">Category name:</label>
                              <input type="text" name="name" id="title" value="<?php echo $name; ?>">

                              <button type="submit" name="submit" id="btn-submit">Update Category</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php 
     include './footer.php';
?>