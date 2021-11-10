<?php 
    include("NewConnection.php");
    session_start();

    $quantity = $_POST['quantityExact'];
    $bookingID = $_SESSION['bookingID'];
    $productID = $_SESSION['ProductIDBook'];
    //echo $quantity; 
    //echo $bookingID;
    //echo $productID;

    $totalbookingdetail = "SELECT COUNT(BookingDetail_ID) AS TOTAL FROM bookingdetail";
    $result = mysqli_query($conn,$totalbookingdetail);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['TOTAL'];
    $increment = $num_rows + 1;
    $bookingdetailID = "BDT" . $increment;
    $sql = "INSERT INTO bookingdetail (BookingDetail_ID, Booking_ID, Product_ID, QuantityProduct) VALUES ('".$bookingdetailID."','".$bookingID."', '".$productID."' , '".$quantity."')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Item added to booked please refer Booking page for confirmation'); window.location = 'customerIndex.php';</script>";

?>