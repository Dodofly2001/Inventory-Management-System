<?php 
include("NewConnection.php");
session_start();

$Ausername = mysqli_real_escape_string($conn,$_POST['Ausername']);
$Apassword = mysqli_real_escape_string($conn,$_POST['Apassword']);
$Aemail = mysqli_real_escape_string($conn,$_POST['Aemail']);
$Aname = mysqli_real_escape_string($conn,$_POST['Aname']);
$Aphonenum = mysqli_real_escape_string($conn,$_POST['Aphonenum']);
$Aaddressnum = mysqli_real_escape_string($conn,$_POST['Aaddressnum']);
$Aaddressstreet = mysqli_real_escape_string($conn,$_POST['Aaddressstreet']);
$Astate = mysqli_real_escape_string($conn,$_POST['Astate']);
$Apostcode = mysqli_real_escape_string($conn,$_POST['Aaddresspostcode']);
$Atown = mysqli_real_escape_string($conn,$_POST['Aaddresstown']);


function checkusername($conn, $Ausername)
{
    $found = false;
    $sql = "SELECT Admin_Username FROM admin WHERE Admin_Username = '".$Ausername."'";

    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);

    if($row > 0){
        $found = true;
    }
    return $found;
}

if($Ausername == "" || $Apassword =="" || $Aemail =="" || $Aname =="" || $Aphonenum =="" || $Aaddressnum =="" || $Aaddressstreet == "" || $Astate=="" || $Atown =="") 
{
    echo "<script language='javascript'>alert('Please enter appropriate value.');window.location='EditAdminDetail.php';</script>";
}
else if(checkusername($conn,$Ausername) == true)
{
    echo "<script language ='javascript'>alert('Username already exist, please make another username');window.location='EditAdminDetail.php';</script>";
}
else if(!filter_var($Aemail, FILTER_VALIDATE_EMAIL))
{
    echo "<script language = 'JavaScript'>alert('Email are not valid, please try to insert again'); window.location = 'EditAdminDetail.php' ;</script>";
}
else if(!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/",$Aphonenum))
{
    echo "<script language = 'JavaScript'>alert('Phone number are not valid, please try to insert again'); window.location = 'EditAdminDetail.php' ;</script>";
}
else if(!preg_match("/^[0-9]{5}$/",$Apostcode) || substr($Apostcode,0) == 0)
{
    echo "<script language = 'JavaScript'>alert('Postcode are not valid, please try to insert again'); window.location = 'EditAdminDetail.php' ;</script>";
}
else
{
    $sql = "UPDATE admin set Admin_Username = '".$Ausername."', AdminPassword = '".md5($Apassword)."' ,AdminEmail = '".$Aemail."', AdminName ='".$Aname."', AdminPnum = '".$Aphonenum."', AdminAddressNumber = '".$Aaddressnum."',AdminAddressStreet = '".$Aaddressstreet."' ,AdminAddressState = '".$Astate."', AdminAddressPostcode = '".$Apostcode."' , AdminAddressTown = '".$Atown."' WHERE Admin_ID = '".$_SESSION['Admin_ID']."' ";
    mysqli_query($conn,$sql);
    echo "<script language='javascript'>alert('Admin Profile has been updated.');window.location='adminIndex.php';</script>";
}

?>