<?php
session_start();
echo "<script language = 'JavaScript'> alert('You have been logout from the system'); window.location = 'viewproductpage.php' ;</script>";
session_unset();
session_destroy();
//header("Location:viewproductpage.php");//header must be close
?>
