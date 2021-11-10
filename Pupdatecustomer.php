<?php 
include("NewConnection.php");
session_start();

$Cusername = mysqli_real_escape_string($conn,$_POST['Cusername']);
$Cpassword = mysqli_real_escape_string($conn,$_POST['Cpassword']);
$Cemail = mysqli_real_escape_string($conn,$_POST['Cemail']);
$Cname = mysqli_real_escape_string($conn,$_POST['Cname']);
$Cphonenum = mysqli_real_escape_string($conn,$_POST['Cphonenum']);
$Caddressnum = mysqli_real_escape_string($conn,$_POST['Caddressnum']);
$Caddressstreet = mysqli_real_escape_string($conn,$_POST['Caddressstreet']);
$Cstate = mysqli_real_escape_string($conn,$_POST['Cstate']);
$Cpostcode = mysqli_real_escape_string($conn,$_POST['Caddresspostcode']);
$Ctown = mysqli_real_escape_string($conn,$_POST['Caddresstown']);


function checkusername($conn, $Cusername)
{
    $found = false;
    $sql = "SELECT Customer_Username FROM customer WHERE Customer_Username = '".$Cusername."'";

    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);

    if($row > 0){
        $found = true;
    }
    return $found;
}

if($Cusername == "" || $Cpassword =="" || $Cemail =="" || $Cname =="" || $Cphonenum =="" || $Caddressnum =="" || $Caddressstreet == "" || $Cstate=="" || $Ctown =="") 
{
    echo "<script language='javascript'>alert('Please enter student name.');window.location='EditCustomerDetail.php';</script>";
}
else if(checkusername($conn,$Cusername) == true)
{
    echo "<script language ='javascript'>alert('Username already exist, please make another username');window.location='EditCustomerDetail.php';</script>";
}
else if(!filter_var($Cemail, FILTER_VALIDATE_EMAIL))
{
    echo "<script language = 'JavaScript'>alert('Email are not valid, please try to insert again'); window.location = 'EditCustomerDetail.php' ;</script>";
}
else if(!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/",$Cphonenum))
{
    echo "<script language = 'JavaScript'>alert('Phone number are not valid, please try to insert again'); window.location = 'EditCustomerDetail.php' ;</script>";
}
else if(!preg_match("/^[0-9]{5}$/",$Cpostcode) || substr($Cpostcode,0) == 0)
{
    echo "<script language = 'JavaScript'>alert('Postcode are not valid, please try to insert again'); window.location = 'EditCustomerDetail.php' ;</script>";
}
else
{
    $sql = "UPDATE customer set Customer_Username = '".$Cusername."', CustomerPassword = '".md5($Cpassword)."' ,CustomerEmail = '".$Cemail."', CustomerName ='".$Cname."', CustomerPnum = '".$Cphonenum."', AddressNumber = '".$Caddressnum."',AddressStreet = '".$Caddressstreet."' ,AddressState = '".$Cstate."',AddressPostcode = '".$Cpostcode."' ,AddressTown = '".$Ctown."' WHERE Customer_ID = '".$_SESSION['Customer_ID']."' ";
    mysqli_query($conn,$sql);
    echo "<script language='javascript'>alert('Customer Profile has been updated.');window.location='customerIndex.php';</script>";
}

?>