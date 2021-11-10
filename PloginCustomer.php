<?php

include("NewConnection.php");


$myusername = mysqli_real_escape_string($conn,$_POST['Cusername']);
$mypassword = mysqli_real_escape_string($conn,$_POST['Cpassword']);

//echo $myusername;
//echo $mypassword;

$sql = "SELECT * FROM customer  WHERE Customer_Username = '".$myusername."' AND CustomerPassword = '".md5($mypassword)."' ";
//echo $sql;
$qry = mysqli_query($conn,$sql);
$row  = mysqli_num_rows($qry);

//audit login
$totaladl = "SELECT COUNT(AuditLogin_ID) AS total FROM auditlogin";
$result = mysqli_query($conn,$totaladl);
$value = mysqli_fetch_assoc($result);
$num_rows = $value['total'];
$increment = $num_rows + 1;
$auditloginID = "ADL" . $increment;

date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date('Y-m-d H-i-s');
//echo $row;
if($row > 0)
{
    $r = mysqli_fetch_assoc($qry);
    session_start();
    $_SESSION['UserLevel'] = 2; //// 1 for admin & 2 for Customer
    $_SESSION['Customer_ID'] = $r['Customer_ID'];
    $_SESSION['CustomerPassword'] = $mypassword;
    $_SESSION['AuditLogin_ID'] = $auditloginID;
    //echo $_SESSION['AuditLogin_ID'];
    //echo $_SESSION['Customer_ID'];
    //echo $_SESSION['CustomerPassword'];
    $sql = "INSERT INTO auditlogin(AuditLogin_ID,Customer_ID,LoginDateTime) VALUES ('".$_SESSION['AuditLogin_ID']."','".$_SESSION['Customer_ID']."','".$date."')";
    mysqli_query($conn,$sql);
    header("Location: customerIndex.php");
    
}
else
{
    echo "<script language='javascript'> alert('User does not exist.'); window.location = 'logincustomer.php';</script>";
}

?>