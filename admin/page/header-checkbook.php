<nav class="navbar navbar-expand-lg navbar-custom" style="display: flex; justify-content: space-between;"> <a
          class='navbar-brand' href="check_book.php">Tít </a>

     <div class="">
          <?php if(isset($_SESSION['user'])): ?>
          <ul class="navbar-nav nav mr-auto">

               <li class="reg_form">
                    <label for="" style="margin-right: 20px;color: white;"><?=$row['user_name']?></label>
                    <a class="btn btn-warning" href="logout.php">Logout</a>
               </li>
          </ul>
          <?php endif; ?>

     </div>
</nav>