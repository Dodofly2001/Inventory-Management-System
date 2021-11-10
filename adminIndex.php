<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
$dbuser = "root";
$dbpass = "";
$dbhost = "localhost:3306";
$dbname = "asg_isp250 new";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!isset($conn))
{
    //echo "Connection is not ok";// print variable echo
}
else 
{
    //echo "hahahahhah connection is okay";
}

session_start();
if(!isset($_SESSION['UserLevel'])|| $_SESSION['UserLevel'] != 1)
{
    header("Location:viewproductpage.php");
}

?>

<html lang="en">
<head>
<style>

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  top: 20px;
  }
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  }

form button {
  background-color: black;
  color: white;
  padding: 12px 200px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  box-shadow: 3px 8px 9px #b3b3b3;
}

.text-center{
  text-align:center;
}

form button:hover,.form button:active,.form button:focus {
  background-color: rgb(65, 65, 65);
  transition: 0.2s;
}

.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
  }
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
  }
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
  }
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
  }
.container .info {
  margin: 50px auto;
  text-align: center;
  }
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
  }
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
  }
.container .info span a {
  color: #000000;
  text-decoration: none;
  }
.container .info span .fa {
  color: #EF3B3A;
  }
  body {
    background: #232323; /* fallback for old browsers */
    /*background: -webkit-linear-gradient(right, #76b852, #8DC26F);
    background: -moz-linear-gradient(right, #76b852, #8DC26F);
    background: -o-linear-gradient(right, #76b852, #8DC26F);
    background: linear-gradient(to left, #76b852, #8DC26F);
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;   */   
  }

select{
    position: relative;
    width: 200px;
    height:30px;
    background-color: #f2f2f2;
    margin:10px;
    
}

.form-row{
  display: flex;
  flex-flow: row wrap;

}

.form-group {
  display:inline-block;  
  margin-left:10px;  
}

.form-side{
  display:block;
  
}

.table{
  text-align:center;
  border: 2px solid #ccc;
  border-radius: 4px;

}

    
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Set product</title>

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
                <a href="adminIndex.php" class="nav-link active">
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
            <h1 class="m-0">Set Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Set Product</li>
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
                <h5 class="card-title">Set Product</h5>

                <p class="card-text">
                  Please upload the photo  of the product (FILE.png are preferred) and fill in the product description
                </p>
                <br>
                <!--
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
                -->
                <form action="PuploadProduct.php" method = "POST" enctype = "multipart/form-data">

                  <input type="file" name = "file">
                  <br>
                  <br>

                <div class = "form-row">
                  <div class = "form-group">
                    <div class = "form-side">

                      <label for = "productname">Product Name:</label>
                      &nbsp;&nbsp;
                      <input type = "text" name = "productname" id = "productname" placeholder="(e.g) Supreme shirt">
                      <br>
                      <br>
                      
                      <label for = "productavailability">Product Availability:</label>
                      &nbsp;&nbsp;
                      <input type = "text" name = "productavailability" id = "productavailability" placeholder = "(e.g) 4" >
                      <br>

                      <br>
                      <label for = "productprice">Product Price:</label>
                      &nbsp;&nbsp;
                      <input type = "text" name = "productprice" id ="productprice" placeholder = "(e.g) 300.00">
                    

                    </div>
                  </div>
                   
                  <div class = "form-group"> 
                    <div class = "form-side">
                   
                      <label for = "categorybuyer">Category Buyer:</label>
                      <select name = "categorybuyer" id="categorybuyer">
                        <option value = "Men">Men</option>
                        <option value = "Women">Women</option>
                        <option value="Kids">Kids</option>
                      </select>

                      <br>
                      <br>
                      <label for = "productsize">Product Size:</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <select name = "productsize" id = "productsize">
                        <option value = "XS">XS</option>
                        <option value = "S">S</option>
                        <option value = "M">M</option>
                        <option value = "L">L</option>
                        <option value = "XL">XL</option>
                        <option value = "XXL">XXL</option>
                      </select>
                      <br>
                      <br>
                      <label for = "productbrand">Product Brand:</label>
      
                      <select name="productbrand" id="productbrand">
                      <?php
                        $sqlprogram = "SELECT * from productbrand";
                        $qryprogram = mysqli_query($conn, $sqlprogram);
                        $rowprogram = mysqli_num_rows($qryprogram);

                        if($rowprogram > 0)
                        {
                          while($dprogram = mysqli_fetch_assoc($qryprogram))
                          {
                              echo "<option value  = '".$dprogram['ProductBrand_ID']."' selected>".$dprogram['BrandName']."</option>";
                          }

                        }
                        
                      ?>
                      </select>

                      
                    </div>
                  </div>
                     
                    

                  
                  <div class = "form-group">
                    
                      <label for = "collartype">Colar Type:</label>
                      &nbsp;&nbsp;&nbsp;
                      <select name = "collartype" id = "collartype">
                        <option value="Collar">Collar</option>
                        <option value = "Non-collar">Non-Collar</option>
                      </select>
                      
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;
                      
                      <label for = "sleevestype">Sleeves Type:</label>
                      &nbsp;&nbsp;&nbsp;
                      <select name = "sleevestype" id = "sleevestype">
                        <option value="Long sleeve">Long Sleeves</option>
                        <option value = "Short sleeves">Short Sleeves</option>
                      </select>
                      <br>
                      <br>
                      
                    </form>
                    <div class = "text-center">
                      <button type="submit" name = "submit">Set Product</button>
                    </div>
                    
                      </div>
                      
                    </div>                   
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
            </div><!-- /.card -->
          </div>
          <div class = "card">
                <div class = "card-body">
                    <h5 class = "card-title">Set courier available </h5>
                    <br>
                    <br>
                    <p class = "card-text">
                      <form action = "Psetcourier.php" method = "POST">
                          Courier: 
                          &nbsp;&nbsp;&nbsp;
                          <input type="text" placeholder = "(e.g)JNT" name = "Namecourier">
                          &nbsp; &nbsp; &nbsp;
                          <button style = "padding: 6px 20px;">Set courier</button>
                      </form> 
                      <br>
                      <br>
                      <h5 class = "card-title"><strong> Note: </strong> Courier that exist in database : </h5>
                      <br>
                      <br>
                      <div style = "width : 30%">
                      <table border = 1 class = "table"> 
                        <th bgcolor = "#f2f2f2">Courier name</th>
                        <?php 
                          $sql = "SELECT CourierName FROM courier";
                          $result = mysqli_query($conn,$sql);
                          $values = mysqli_num_rows($result);

                          if($values > 0)
                          {
                            while($row = mysqli_fetch_assoc($result))
                            {
                              $name = $row['CourierName'];
                              echo "<tr><td align = center>".$name."</td></tr>";
                            }
                          }
                        ?>
                      </table>
                    </p>
                </div>
              </div>
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
