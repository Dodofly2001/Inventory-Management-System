<?php 
    include("NewConnection.php");
    $bookingID = $_POST['bookingID'];
    echo $bookingID;

    $sql = "UPDATE ProofPayment SET ProofPaymentStatus = 'Cancel' WHERE Booking_ID = '".$bookingID."' ";
    mysqli_query($conn,$sql);
    
    $sql = "SELECT * FROM BookingDetail WHERE Booking_ID = '".$bookingID."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row > 0)
    {
        while($value = mysqli_fetch_array($result))
        {
            $quantity = $value['QuantityProduct']; 
            $productID = $value['Product_ID']; 

            $sql = "SELECT ProductAvailability FROM product WHERE Product_ID = '".$productID."'";
            $result = mysqli_query($conn,$sql);
            $value = mysqli_fetch_assoc($result);
            $currenttotal = $value['ProductAvailability'];
            $newtotal = $currenttotal + $quantity;

            $sql2 = "UPDATE product SET ProductAvailability = '".$newtotal."' WHERE Product_ID = '".$productID."'";
            mysqli_query($conn,$sql);
        }
        echo "<script>alert('Booking has been cancel');window.location = 'ViewBookedProduct.php'</script>";
    }
   
?>