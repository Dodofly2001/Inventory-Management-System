<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php

session_start();
if(!isset($_SESSION['UserLevel'])|| $_SESSION['UserLevel'] != 1)
{
    header("Location:viewproductpage.php");
}

?>
<style>
 #imgdiv{
    display: inline-block;
    max-width:100%;
    margin: 40px;
    position: relative;

    left:-10%;
 }

table, th, td {
    border: 0px solid black;
    border-collapse: collapse;
    padding: 5px;
   
}


th, td{
    text-align: left;
    
}
  
.container::after, .row::after{
    content: "";
    clear: both;
    display: inline-block;
}

.row1{     
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;

}

.column {
  float: left;
  width: 23%;
  padding: 5px;
}

.column1 {
  float: left;
  width: 13%;
  padding: 5px;
}

.column2 {
  float: left;
  width: 25%;
  padding: 5px;
}

.responsive {
  width: 100%;
  height: auto;
}
</style>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dev Info</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    -->
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="adminIndex.php" class="brand-link">
      <img src="dist/img/logo7teen.png" alt="7teen Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bundle Booking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- SidebarSearch Form -->
      <!--
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
    -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Click Me
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adminIndex.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="BookedProduct.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booked Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="UpdateProduct.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="EditAdminDetail.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Personal Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Stats.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stats</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="DevInfo.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Development Team Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="PlogoutAdmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Development Team Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Development Team Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Project Manager</h5>
                                
                  <br><br>
                  <div class = "row">
                      <div class = "column">
                        <img src = "../BBS/DevInfo/Afiq_M.png" class = "responsive" width = "250px" height = "300px">
                      </div> 

                      <div class = "column1">
                      <table>
                            <tr><td> Name: </td></tr> 
                            <t><td>Student Number: </td></tr>
                            <tr><td>IC Number: </td></tr>
                            <tr><td>Program Code: </td></tr>
                            <tr><td>Group/Class: </td></tr>
                            <tr><td>Email:</td></tr>
                      </table>
                      </div>

                      <div class = "column2">
                        <table>
                              <tr><td><b>AFIQ MUHAIMIN B. RASSOR SHAHROL</b></td></tr> 
                              <tr><td><b>2019241554</b></td></tr>
                              <tr><td><b>011121-10-0213</b></td></tr>
                              <tr><td><b>CS110</b></td></tr>
                              <tr><td><b>CS110 4D</b></td></tr>
                              <tr><td><a href = "MAILTO : afiqmuhaiminshahrol@gmail.com" >afiqmuhaiminshahrol@gmail.com</a></td></tr>
                        </table>
                      </div>
                  </div>

                       
            </div>
          </div>

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Progammer 1</h5>

                <br><br>
                  <div class = "row">
                      <div class = "column">
                        <img src = "../BBS/DevInfo/Afiq_N.png" class = "responsive" width = "250px" height = "300px">
                      </div> 

                      <div class = "column1">
                      <table>
                            <tr><td> Name: </td></tr> 
                            <t><td>Student Number: </td></tr>
                            <tr><td>IC Number: </td></tr>
                            <tr><td>Program Code: </td></tr>
                            <tr><td>Group/Class: </td></tr>
                            <tr><td>Email:</td></tr>
                      </table>
                      </div>

                      <div class = "column2">
                        <table>
                              <tr><td><b>AFIQ NURHARIZ B. NORZALIZA</b></td></tr> 
                              <tr><td><b>2019413144</b></td></tr>
                              <tr><td><b>011020-10-0353</b></td></tr>
                              <tr><td><b>CS110</b></td></tr>
                              <tr><td><b>CS110 4D</b></td></tr>
                              <tr><td><a href = "MAILTO : afiqnurhariz@gmail.com" >afiqnurhariz@gmail.com</a></td></tr>
                        </table>
                      </div>
                    </div>

              </div>
            </div>
           

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Programmer 2</h5>

                <br><br>
                  <div class = "row">
                      <div class = "column">
                        <img src = "../BBS/DevInfo/Nabil.png" class = "responsive" width = "250px" height = "300px">
                      </div> 

                      <div class = "column1">
                      <table>
                            <tr><td> Name: </td></tr> 
                            <t><td>Student Number: </td></tr>
                            <tr><td>IC Number: </td></tr>
                            <tr><td>Program Code: </td></tr>
                            <tr><td>Group/Class: </td></tr>
                            <tr><td>Email:</td></tr>
                      </table>
                      </div>

                      <div class = "column2">
                        <table>
                              <tr><td><b>MUHAMMAD NABIL B. AHMAD</b></td></tr> 
                              <tr><td><b>2019209382</b></td></tr>
                              <tr><td><b>010702-14-0585</b></td></tr>
                              <tr><td><b>CS110</b></td></tr>
                              <tr><td><b>CS110 4D</b></td></tr>
                              <tr><td><a href = "MAILTO : Mnabil6128@gmail.com" >Mnabil6128@gmail.com</a></td></tr>
                        </table>
                      </div>
                    </div>

              </div>
            </div>
         

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Database Designer</h5>

                <br><br>
                <div class = "row">
                    <div class = "column">
                      <img src = "../BBS/DevInfo/Salikin.jpg" class = "responsive" width = "250px" height = "300px">
                    </div> 

                    <div class = "column1">
                    <table>
                          <tr><td> Name: </td></tr> 
                          <t><td>Student Number: </td></tr>
                          <tr><td>IC Number: </td></tr>
                          <tr><td>Program Code: </td></tr>
                          <tr><td>Group/Class: </td></tr>
                          <tr><td>Email:</td></tr>
                    </table>
                    </div>

                    <div class = "column2">
                      <table>
                            <tr><td><b>AHMAD NUR SALIKIN B. MAZLAN</b></td></tr> 
                            <tr><td><b>201940098</b></td></tr>
                            <tr><td><b>010618-06-0611</b></td></tr>
                            <tr><td><b>CS110</b></td></tr>
                            <tr><td><b>CS110 4D</b></td></tr>
                            <tr><td><a href = "MAILTO : salikinmazlan1@gmail.com" >salikinmazlan1@gmail.com</a></td></tr>
                      </table>
                    </div>
                  </div>


              </div>
            </div>
        
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; BBS Bundle Booking System</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
