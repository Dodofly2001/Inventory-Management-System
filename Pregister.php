<?php 
include("NewConnection.php");
session_start();
$Cusername = $_POST['Cusername'];
$Cpassword = $_POST['Cpassword'];
$Cemail =$_POST['Cemail'];
$Cname = $_POST['Cname'];
$Cphonenum = $_POST['Cphonenum'];
$Caddressnum = $_POST['Caddressnum'];
$Caddressstreet = $_POST['Caddressstreet'];
$Cstate = $_POST['Cstate'];
$Cpostcode = $_POST['Caddresspostcode'];
$Ctown = $_POST['Caddresstown'];
/*
echo $Cusername;
echo $Cpassword;
echo $Cemail;
echo $Cname;
echo $Cphonenum;
echo $Caddressnum;
echo $Caddressstreet;
echo $Cstate;
echo $Cpostcode;
echo $Ctown;
*/
//made by afiq muhaimin //increment mechanism
$totalcustomer = "SELECT COUNT(Customer_ID) AS total from customer";
$result = mysqli_query($conn,$totalcustomer);
$values = mysqli_fetch_assoc($result);
$num_rows = $values['total'];
$increment = $num_rows + 1;
$customerID = "CU" . $increment; //"afiq" + "hariz" = afiqhariz

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

if(checkusername($conn, $Cusername) == true)
{
    echo "<script language = 'JavaScript'>alert('Username already exist, please make another username'); window.location = 'registercustomer.php' ;</script>";
}
else if(!filter_var($Cemail, FILTER_VALIDATE_EMAIL))
{
    echo "<script language = 'JavaScript'>alert('Email are not valid, please try to insert again'); window.location = 'registercustomer.php' ;</script>";
}
else if(!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/",$Cphonenum))
{
    echo "<script language = 'JavaScript'>alert('Phone number are not valid, please try to insert again'); window.location = 'registercustomer.php' ;</script>";
}
else if(!preg_match("/^[0-9]{5}$/",$Cpostcode) || substr($Cpostcode,0) == 0)
{
    echo "<script language = 'JavaScript'>alert('Postcode are not valid, please try to insert again'); window.location = 'registercustomer.php' ;</script>";
}
else if($Cusername == "" || $Cpassword =="" || $Cemail =="" || $Cname =="" || $Cphonenum =="" || $Caddressnum =="" || $Caddressstreet == "" || $Cstate=="" || $Ctown =="") 
{
    echo "<script language='javascript'>alert('Dont leave any blank box, please enter appropriate value.');window.location='registercustomer.php';</script>";
}
else
{
    $sql = "INSERT INTO customer (Customer_ID,CustomerPassword, Customer_Username,CustomerEmail,CustomerName,CustomerPnum,AddressNumber,AddressStreet,AddressState,AddressPostcode,AddressTown) VALUES ('".$customerID."','".md5($Cpassword)."','".$Cusername."','".$Cemail."','".$Cname."','".$Cphonenum."','".$Caddressnum."','".$Caddressstreet."','".$Cstate."','".$Cpostcode."','".$Ctown."')";
    mysqli_query($conn,$sql);

    $_SESSION['Customer_ID'] = $customerID;
    $_SESSION['UserLevel'] = 2;
    $totaladl = "SELECT COUNT(AuditLogin_ID) AS total FROM auditlogin";
    $result = mysqli_query($conn,$totaladl);
    $value = mysqli_fetch_assoc($result);
    $num_rows = $value['total'];
    $increment = $num_rows + 1;
    $auditloginID = "ADL" . $increment;
    $_SESSION['AuditLogin_ID'] = $auditloginID;
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d H-i-s');
    $sql = "INSERT INTO auditlogin(AuditLogin_ID,Customer_ID,LoginDateTime) VALUES ('".$_SESSION['AuditLogin_ID']."','".$_SESSION['Customer_ID']."','".$date."')";
    mysqli_query($conn,$sql);

    echo "<script language='javascript'>alert('Registration is success.');window.location='StartNewOrder.php';</script>";
}


?>