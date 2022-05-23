<?php 
     include 'connect.php';
     include './header.php';

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
                              <label for="title">Category name:</label>
                              <input type="text" name="name" id="title">

                              <button type="submit" name="submit" id="btn-submit">Add Category</button>
                         </form>
                         <?php 
                              if(isset($_POST['submit'])){
                                   $category_id = $_POST['category_id'];
                                   $name = $_POST['name'];

                                   $sql = "INSERT INTO category(name) VALUES ('$name')";

                                   $res = mysqli_query($conn, $sql);
                                   
                                   if($res === true){
                                        echo "Add product successfully";
                                        echo "<script type='text/javascript'> window.location.assign('?page=list-categories-product')</script>";
                                   }else{
                                        echo "Error: ".$sql.":-".mysqli_error($conn);
                                   }
                                   mysqli_close($conn);
                              }
                         ?>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php 
     include './footer.php';
?>