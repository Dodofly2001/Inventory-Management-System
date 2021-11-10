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
    .table{
      text-align:center;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
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
                <a href="customerIndex.php" class="nav-link">
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
                <a href="Booking.php" class="nav-link active">
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
            <h1 class="m-0">Booking page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Booking Page</li>
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
                <h5 class="card-title">Booking page</h5>

                <p class="card-text">
                  Please continue with the booking process and select the courier type
                </p>

                <?php 
                include("NewConnection.php");
                $sql = "SELECT Booking_ID AS BOOKINGID FROM booking WHERE Customer_ID = '".$_SESSION['Customer_ID']."'ORDER BY Booking_ID DESC LIMIT 1";
                $resultsql = mysqli_query($conn,$sql);
                $valuesql = mysqli_fetch_assoc($resultsql);
                $numrows = mysqli_num_rows($resultsql);
                if($numrows > 0)
                {
                  $currentbookingID = $valuesql['BOOKINGID'];
                  echo "<p>Booking ID: " . $currentbookingID . "</p>";
                }
                else 
                {
                  echo "<p>Booking ID: </p>";
                }
                
                ?>
                  <table border = 1 width = "50%" Align = "center" class="table">
                  <th>Product Name </th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                  
                  <?php 
                   function checkbookinginfo($conn,$bookingID)
                   {
                       $sql = "SELECT * FROM booking WHERE Booking_ID = '".$bookingID."'";
                       $result = mysqli_query($conn,$sql);
                       $value = mysqli_fetch_assoc($result);
                       $bookingTime = $value['BookingTime'];
                       $bookingDate = $value['BookingDate'];
                   
                       $expect = false;
                       if($bookingTime != '00:00:00' && $bookingDate != "0000-00-00")
                       {
                           $expect = true;
                       }
                       else {
                           $expect = false;
                       }
                       return $expect;
                   }

                   if($numrows>0)
                   {
                      $sql = "SELECT * FROM bookingdetail WHERE Booking_ID = '".$currentbookingID."'";
                      $result = mysqli_query($conn,$sql);
                      $values = mysqli_num_rows($result);

                      if($values > 0)
                      {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $productID = $row['Product_ID'];
                          $sqlname = "SELECT ProductName AS PRODUCTNAME FROM product WHERE Product_ID = '".$productID."' ";
                        
                          $resultname = mysqli_query($conn,$sqlname);
                          $valuesname = mysqli_fetch_assoc($resultname);
                          $productName = $valuesname['PRODUCTNAME'];
                        
                          $productQuantity = $row['QuantityProduct'];
                          $productID = $row['Product_ID'];

                          $sqlprice = "SELECT ProductPrice AS PRICE FROM product WHERE Product_ID = '".$productID."'";
                          $resultprice = mysqli_query($conn,$sqlprice);
                          $valuesprice = mysqli_fetch_assoc($resultprice);

                          $productPrice = $valuesprice['PRICE']; 
                          $total = $productQuantity * $productPrice;
                          $bookingdetailID = $row['BookingDetail_ID'];
                          $productID = $row['Product_ID'];
                          
                          echo "<form action ='Premovebookingdetail.php' method = 'POST'>";
                          echo "<input type = 'hidden' value = '".$bookingdetailID."' name = 'bookingdetailID'>";
                          echo "<input type = 'hidden' value = '".$productID."' name = 'productID'>";
                          echo "<input type = 'hidden' value = '".$productQuantity."' name = 'quantity'>";
                          if(checkbookinginfo($conn,$currentbookingID) == true)
                          {
                            echo "<tr><td>".$productName."</td><td>".$productPrice."</td><td>".$productQuantity."</td><td>".$total."</td><td><input type = 'submit' value ='Remove' disabled></td></tr>";
                          }
                          else 
                          {
                            echo "<tr><td>".$productName."</td><td>".$productPrice."</td><td>".$productQuantity."</td><td>".$total."</td><td><input type = 'submit' value ='Remove'></td></tr>";
                          }
                          echo "</form>";
                        }
                      ?>
                      </table>
                       <center>
                       <br>
                        <form action="Pconfirmbooking.php" method = "POST">
                        <?php 
                          if(checkbookinginfo($conn,$currentbookingID) == true)
                          {
                        ?>
                        <select name = "courier" id = "courier" disabled>
                        <?php 
                          include("NewConnection.php");
                          $couriersql = "SELECT * FROM courier";
                          $result = mysqli_query($conn,$couriersql);
                          $rowprogram = mysqli_num_rows($result);
                    
                          while($courier = mysqli_fetch_assoc($result))
                          {
                            echo "<option value = '".$courier['Courier_ID']."' selected>".$courier['CourierName']."</option>";
                          }
                            echo "<input type = 'hidden' name = 'bookingID' value = '".$currentbookingID."'>";
                        ?>
                        </select>
                        <?php 
                        }
                        else 
                        {
                      ?>
                      <select name = "courier" id = "courier" >
                          <?php 
                          include("NewConnection.php");
                            $couriersql = "SELECT * FROM courier";
                            $result = mysqli_query($conn,$couriersql);
                            $rowprogram = mysqli_num_rows($result);
                          
                            while($courier = mysqli_fetch_assoc($result))
                            {
                              echo "<option value = '".$courier['Courier_ID']."' selected>".$courier['CourierName']."</option>";
                            }
                            echo "<input type = 'hidden' name = 'bookingID' value = '".$currentbookingID."'>";
                          ?>
                      </select>
                      <?php 
                        }
                      ?>
                        <br>
                        <br>
                        <div class="confirm">
                        <?php 
                          $sql = "SELECT * FROM booking WHERE Booking_ID = '".$currentbookingID."'";
                          $result = mysqli_query($conn,$sql);
                          $value = mysqli_fetch_assoc($result);
                          $bookingTime = $value['BookingTime'];
                          $bookingDate = $value['BookingDate'];
                          
                          if($bookingTime != '00:00:00' && $bookingDate != "0000-00-00")
                          {
                            echo "<input type= 'submit' value = 'Confirm Booking' disabled>";
                          }
                          else
                          {
                            echo "<input type= 'submit' value = 'Confirm Booking' >";
                          }
                        ?>
                        </div>
                        </form>
                      <?php
                          }
                        }
                      ?>
                
                  
                 
               
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
