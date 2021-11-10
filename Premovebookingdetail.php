<?php 
    include("NewConnection.php");
    $bookingdetailID = $_POST['bookingdetailID'];
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $sql = "DELETE FROM bookingdetail WHERE BookingDetail_ID = '".$bookingdetailID."'";
    mysqli_query($conn,$sql);
    /*
    $sql = "SELECT ProductAvailability FROM product WHERE Product_ID = '".$productID."'";
    $result = mysqli_query($conn,$sql);
    $value = mysqli_fetch_assoc($result);
    $currenttotal = $value['ProductAvailability'];
    $newtotal = $currenttotal + $quantity;

    $sql2 = "UPDATE product SET ProductAvailability = '".$newtotal."' WHERE Product_ID = '".$productID."'";
    mysqli_query($conn,$sql);
    */
    
    echo "<script>alert('Item has been removed from booking'); window.location = 'Booking.php' </script>";
?>