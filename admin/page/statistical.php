<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Trang Quản Lý</title>

     <!-- <link rel="stylesheet" href="./css/style.css"> -->
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
     </script>
     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
</head>
<?php
include './header.php';
include 'connect.php';
?>

<body class="sb-nav-fixed">
     <div id="layoutSidenav">
          <div id="layoutSidenav_content">
               <main>
                    <div class="container-fluid">
                         <h1 class="mt-4">Thống kê doanh thu</h1>
                         <ol class="breadcrumb mb-4">
                              <li class="breadcrumb-item active">Thống kê doanh thu theo ngày / tháng / nam </li>
                         </ol>
                         <div class="row">
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Doanh thu ngày</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-warning text-white mb-4">
                                        <div class="card-body"> Doanh thu Tháng</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">

                                             <a class="small text-white stretched-link" href="#"></a>

                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Doanh thu Năm</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">

                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                   <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Tổng Doanh thu:</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">

                                             <a class="small text-white stretched-link" href="#"></a>

                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="card mb-4 m-3">
                              <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê năm :</div>
                              <div class="card-body">
                                   <div class="table-responsive" id="data">
                                        <table class="table table-hover text-center">
                                             <thead>
                                                  <tr>
                                                       <th>Tháng</th>
                                                       <th>Doanh thu</th>
                                                       <th style="max-width: 100px;">Tổng lượng doanh thu theo năm
                                                       </th>
                                                  </tr>
                                             </thead>
                                             <tbody>

                                                  <tr>
                                                       <th></th>

                                                       <th></th>

                                                       <th></th>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>

                         <div class="card mb-4 m-3">
                              <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê quý :
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive" id="data">
                                        <table class="table table-hover text-center">
                                             <thead>
                                                  <tr>
                                                       <th>Quý</th>
                                                       <th>Doanh thu</th>
                                                       <th style="max-width: 100px;">Tổng lượng doanh thu theo năm

                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <th></th>

                                                       <th></th>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>

                         <div class="card mb-4 m-3">
                              <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê theo tháng/ năm</div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                             <thead>
                                                  <tr>
                                                       <th>ID</th>
                                                       <th>Tên Admin</th>
                                                       <th>Tháng 1</th>
                                                       <th>Tháng 2</th>
                                                       <th>Tháng 3</th>
                                                       <th>Tháng 4</th>
                                                       <th>Tháng 5</th>
                                                       <th>Tháng 6</th>
                                                       <th>Tháng 7</th>
                                                       <th>Tháng 8</th>
                                                       <th>Tháng 9</th>
                                                       <th>Tháng 10</th>
                                                       <th>Tháng 11</th>
                                                       <th>Tháng 12</th>

                                                  </tr>
                                             </thead>
                                             <tbody>

                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>

                         <div class="card mb-4 m-3">
                              <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê theo admin theo quý/
                                   năm
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                             <thead>
                                                  <tr>
                                                       <th>ID</th>
                                                       <th>Tên Admin</th>
                                                       <th>Quý I</th>
                                                       <th>Quý II</th>
                                                       <th>Quý III</th>
                                                       <th>Quý IV</th>
                                                  </tr>
                                             </thead>
                                             <tbody>

                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>

                         <button type="submit" name="submit" id=" btn btn-submit">In thống kê</button>
                         <br>
                    </div>
               </main>
          </div>
     </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<?php include './footer.php'; ?>