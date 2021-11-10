<?php

include("NewConnection.php");


$myusername = mysqli_real_escape_string($conn,$_POST['Ausername']);
$mypassword = mysqli_real_escape_string($conn,$_POST['Apassword']);

//echo $myusername;
//echo $mypassword;

$sql = "SELECT * FROM admin WHERE Admin_Username = '".$myusername."' AND AdminPassword = '".md5($mypassword)."'";
$qry = mysqli_query($conn,$sql);
$row  = mysqli_num_rows($qry);



//echo $row;
if($row > 0)
{
    $r = mysqli_fetch_assoc($qry);
    session_start();
    $_SESSION['UserLevel'] = 1; // 1 for admin & 2 for Customer
    $_SESSION['Admin_ID'] = $r['Admin_ID'];
    $_SESSION['AdminPassword'] = $mypassword;

    header("Location: adminIndex.php");
    
}
else
{
    echo "<script language='javascript'> alert('User does not exist.'); window.location = 'loginadmin.php';</script>";
}

?>