<?php 

include("NewConnection.php");
$trackingnumber = $_POST['trackingnumber'];
$shipmentdateout = $_POST['shippingdate'];
$shipmenttimeout = $_POST['shippingtime'];
$bookingID = $_POST['bookingID'];
$status = "Complete";
//echo $trackingnumber. " ";
//echo $shipmentdateout. " ";
//echo $shipmenttimeout. " ";

$sql = "UPDATE booking SET TrackingNo = '".$trackingnumber."', ShipmentDate = '".$shipmentdateout."', ShipmentTime = '".$shipmenttimeout."' WHERE Booking_ID = '".$bookingID."'";
$result = mysqli_query($conn,$sql);
$sql = "UPDATE proofpayment SET ProofPaymentStatus = '$status' WHERE Booking_ID = '".$bookingID."'";
$result = mysqli_query($conn,$sql);

echo "<script>alert('Booking info has been update');window.location = 'BookedProduct.php';</script>";



?>