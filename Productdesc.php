<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php

session_start();
if(!isset($_SESSION['UserLevel'])|| $_SESSION['UserLevel'] != 2)
{
  header("Location:viewproductpage.php");
}


?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booking</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .container{
      display: flex;
      align-items: center top;
    }
    .container.col{
      width: 35%;
      display:inline block;
    }
    .title{
      font-size:30px;
    }
    .price{
      display: flex;
      align-items: center top;
      font-size:18px;
    }
    .increment{
      display: flex;
      align-items: center top;
    }
    .avb{
      display: flex;
      align-items: center top;
      font-style:italic;
      font-size:14px;
    }
    .desc{
      display: inline block;
      align-items: center top;
      font-size:19px;
    }

    input[type = text]{
      width:50px;
      border: 1px;
      background-color: whitesmoke;
    }

    input[type=submit] 
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
    
    h4{
      margin: 0 30px;
    }

    button{
      width: 50px;
      height: 30px;
      border: 1px;
      border-radius: 4px;
      cursor: pointer;
      background-color: #bababa;
     
    }
    button:hover{
      background-color:grey;
      transition: 0.2s;
    }

  </style>
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
        <a href="customerIndex.php" class="nav-link">Home</a>
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
    <a href="customerIndex.php" class="brand-link">
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
                <a href="customerIndex.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="StartNewOrder.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Start New Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Booking.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ViewBookedProduct.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Booked Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="EditCustomerDetail.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Personal Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="PlogoutCustomer.php" class="nav-link">
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
            <h1 class="m-0">Product description</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="customerIndex.php">Home</a></li>
              <li class="breadcrumb-item">Product Page</li>
              <li class = "breadcrumb-item active">Product description</li>
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
                <h5 class="card-title">Product Description</h5>

                <p class="card-text">
                  Your product detail are shown below
                  <?php 
                  
                  include("NewConnection.php");

                  $productID = mysqli_real_escape_string($conn,$_POST['productID']);
                  $_SESSION['ProductIDBook'] = $productID;
                  $sql = "SELECT * FROM product WHERE Product_Id = '".$productID."'";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_assoc($result);
                  echo "<br>";
                  echo "<div class='container'>";
                  echo "<div class='col'>";
                  echo "<img src = 'uploads/".$row['ProductFileName']."' width = 480px height = 360px>";
                  echo "</div>";
                  echo "<div class='col'>";
                  echo "<div class='title'>";
                  echo "<option value = '".$row['ProductName']."' selected>".$row['ProductName']."</option>";
                  echo "</div>";

                  echo "<div class='desc'>";
                  echo "<div class='container'>";
                  echo "Size : ";
                  echo "<option value = '".$row['ProductSize']."' selected>".$row['ProductSize']."</option>";
                  echo "</div>";
                  echo "<div class='container'>";
                  echo "Category : ";
                  echo "<option value = '".$row['CategoryBuyer']."' selected>".$row['CategoryBuyer']."</option>";
                  echo "</div>";
                  echo "<div class='container'>";
                  echo "Sleeve : ";
                  echo "<option value = '".$row['SlevesType']."' selected>".$row['SlevesType']."</option>";
                  echo "</div>";
                  echo "<div class='container'>";
                  echo "Collar : ";
                  echo "<option value = '".$row['ColarType']."' selected>".$row['ColarType']."</option>";
                  echo "</div>";
                  echo "</div>";

                  echo "<br>";
                  echo "<div class='price'>";
                  echo "RM ";
                  echo "<option value = '".$row['ProductPrice']."' selected>".$row['ProductPrice']."</option>";
                  echo "</div>";

                  
                  echo "<div class = 'increment'>";                  
                  echo "<button onclick = 'decrement()'> - ";
                  echo "</button>";
                  echo "<h4 id = 'quantity' name = 'quantity' ></h4>";                 
                  echo "<button onclick = 'increment()'> + ";
                  echo "</button>";
                  echo "</div";
                  
                  if($row['ProductAvailability'] > 0)
                  {
                    echo "<div class='avb'>";
                    echo "<option value = '".$row['ProductAvailability']."' selected>".$row['ProductAvailability']."</option>";
                    echo " piece available";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                  }
                  else
                  {
                    echo "<div class='avb'>";
                    echo "<option value = '-1'selected></option>";
                    echo "Product is not available";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                  }
                  

                  $totalauditview = "SELECT COUNT(AuditView_ID) AS total FROM auditview";
                  $result = mysqli_query($conn, $totalauditview);
                  $values = mysqli_fetch_assoc($result);
                  $num_rows = $values['total'];
                  $increment = $num_rows + 1;
                  $auditviewID = "ADV".$increment;

                  date_default_timezone_set("Asia/Kuala_Lumpur");
                  $date = date('Y-m-d H-i-s');

                  $sql = "INSERT INTO auditview(AuditView_ID, Customer_ID, Product_ID, ViewsDateTime) VALUES ('".$auditviewID."','".$_SESSION['Customer_ID']."', '".$productID."', '".$date."')";
                  mysqli_query($conn,$sql);

                  $sql1 = "SELECT ProductAvailability AS QUANTITY FROM product WHERE Product_ID = '".$productID."'";
                  
                  $result1 = mysqli_query($conn, $sql1);
                  $value = mysqli_fetch_assoc($result1);
                  $quantity = $value['QUANTITY'];

                  echo " 
                  <script>

                    var quantity = 1;
                    document.getElementById('quantity').innerText = quantity;
                    
                    function decrement(){
                      if (quantity <= 1){
                        quantity = 1;
                      }
                      else {
                      quantity = quantity-1;
                      }

                      document.getElementById('quantity').innerText = quantity;
                      document.getElementById('quantityExact').value = quantity;
                    }
                    function increment(){
                      var max = parseInt('".$quantity."');
                      if (quantity < max){
                        quantity = quantity+1;
                      }
                      else {
                        quantity = quantity;
                      }
                      
                      document.getElementById('quantity').innerText = quantity;
                      document.getElementById('quantityExact').value = quantity;
                    }

                  </script> ";

                

                  ?>

                

                <div class = "container">
                <div class = "col">
                </div>

                
                <div class = "col">

                <br>
                <br>
                
                <?php 
                  if($row['ProductAvailability'] > 0)
                  {
                ?>
                <form action = "Pbooking.php" method = "POST">
                    <input type = "hidden" id = "quantityExact" name ="quantityExact" value = "1" > 
                    <input type="submit" value="Add to Booking" >
                </form> 
                <?php 
                  }
                  else
                  {    
                ?>
                  <form action = "Pbooking.php" method = "POST">
                    <input type = "hidden" id = "quantityExact" name ="quantityExact" value = "1" > 
                    <input type="submit" value="Add to Booking" disabled>
                </form> 
                <?php 
                  }
                ?>
                
                </p>
             

                </div>
                </div>
                <!--
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
                -->

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
            </div><!-- /.card -->
          </div>
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
