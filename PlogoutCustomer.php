<?php
include("NewConnection.php");
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date('Y-m-d H-i-s');
$sql = "UPDATE auditlogin SET LogoutDateTime = '".$date."' WHERE AuditLogin_ID ='".$_SESSION['AuditLogin_ID']."' ";
//echo $sql;
mysqli_query($conn,$sql);
echo "<script language = 'JavaScript'> alert('You have been logout from the system'); window.location = 'viewproductpage.php' ;</script>";
session_unset();
session_destroy();

//header("Location:viewproductpage.php");//header must be close
?>