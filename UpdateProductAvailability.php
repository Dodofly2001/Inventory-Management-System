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

<html lang="en">
<head>

<style>

    .table{
      text-align:center;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      width: 70%;
    }
    .confirm input[type=submit] 
    {
      background-color: black;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 3px 8px 9px #b3b3b3;
    } 
    
    input[type=submit]:hover 
    {
      background-color: rgb(65, 65, 65);
      transition: 0.2s;
    }
    .table input[type=submit] 
    {
      background-color: rgb(170, 170, 170);
      color: white;
      padding: 6px 12px;
      border:none;
      border-radius: 4px;
      cursor: pointer;
    } 
    .table input[type=submit]:hover 
    {
      background-color: rgb(140, 140, 140);
      transition: 0.2s;
    }
    input[type=text], select
    {
        width: 15%;
        padding: 6px 10px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        outline: none;
    }
   
    .form-row{
      content: " ";
      clear: both;
      display: table;
    }
    .form-group {
      float: left;
      width: 100%;
      padding: 5px;
     
    }
    input[type=submit] {
      background-color: black;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 3px 8px 9px #b3b3b3;
    }
    input[type=submit]:hover {
      background-color: rgb(65, 65, 65);
      transition: 0.2s;
    }
    
    </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Product Detail</title>

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
        <a href="adminIndex.php" class="nav-link">Home</a>
      </li>
      <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      -->
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
                <a href="BookedProduct.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booked Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ProofPayment.php" class="nav-link active">
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
                <a href="DevInfo.php" class="nav-link">
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
          <!--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          -->
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
            <h1 class="m-0">Edit Product Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product Detail</li>
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
                <h5 class="card-title">Set Product Detail</h5>

                <p class="card-text">
                  Please update product detail
                </p>

                <table border = 1 class = "table">
                <th>Product Name</th>
                <th>Product Availability</th>
                <th>Product Price</th>
                <?php 
                  include("NewConnection.php");
                  $productID = $_POST['productID'];
                  $sql = "SELECT * FROM product WHERE Product_ID = '".$productID."'";
                  $result = mysqli_query($conn,$sql);
                  $value = mysqli_fetch_array($result);
                  
                    $productName = $value['ProductName'];
                    $productID = $value['Product_ID'];
                    $productAvailability = $value['ProductAvailability'];
                    $productPrice = $value['ProductPrice'];
                   
                    
                    echo "<tr><td>".$productName."</td><td>".$productAvailability."</td><td>".$productPrice."</td></tr>";
                    
                    
                ?>                
                </table>
                
                <br>
                <p>Please enter new value for product availability</p>
                <p><strong>Note:</strong> the update value will be add and will <strong>Not</strong> be ovewrite</p>
                <form action = "PupdateQuantity.php" method = "POST">
                <input type = "hidden" name = "productID" value = <?php echo $productID;?>>
                <input type = "text" name = "NewQuantity" >
                &nbsp;&nbsp;&nbsp;
                <input style = " padding: 8px 20px;" type = "submit" value = "Update">
                </form>
                <br>
                <br>
                <form action = "PupdateUnavailable.php" method = "POST">
                <input type = "hidden" name = "productID" value = <?php echo $productID;?>>
                <input type = "submit" value = "Set product to be unavailable">
                </form>

                <!--
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
                -->
                
              </div>
            </div>
            <!--
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            -->
            <!-- /.card -->
          <!-- /.col-md-6 -->
          <!--
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          -->
          </div>
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
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy;  BBS Bundle Booking System</strong> All rights reserved.
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
