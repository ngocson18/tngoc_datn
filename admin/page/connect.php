<?php 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "bepcuangoc";

     // create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     
     if ($conn) {
          mysqli_query($conn, "SET NAMES 'utf8'");
          // echo "Connection complete";
     }else{
          die("Sorry!".mysqli_connect_error());
     }

     date_default_timezone_set('Asia/Ho_Chi_Minh');
     
?>
