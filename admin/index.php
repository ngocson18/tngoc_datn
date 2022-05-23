<?php 
     $page = isset($_GET['page']) ? $_GET['page'] : 'list-user';
     $path = "./page/{$page}.php";

     if(file_exists($path)){
          require "{$path}";
     }else{
          require "./page/404.php";
     }

?>