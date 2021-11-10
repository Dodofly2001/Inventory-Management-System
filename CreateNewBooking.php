<?php 
    include("NewConnection.php");
    session_start();
    
function checksession($conn, $bookingID)
{
    $found = true;
    $sql = "SELECT Booking_ID from bookingdetail WHERE Booking_ID = '".$bookingID."' ";
    //echo $sql;
    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);
    
    if($row > 0)
    {
        $found = true;
    }
    else 
    {
        $found = false;
    }
    return $found;
}
function checkbookinginfo($conn,$bookingID)
{
    $sql = "SELECT * FROM booking WHERE Booking_ID = '".$bookingID."'";
    $result = mysqli_query($conn,$sql);
    $value = mysqli_fetch_assoc($result);
    $bookingTime = $value['BookingTime'];
    $bookingDate = $value['BookingDate'];

    $expect = false;
    if($bookingTime != '00:00:00' && $bookingDate != "0000-00-00")
    {
        $expect = true;
    }
    else {
        $expect = false;
    }
    return $expect;
}


if(isset($_SESSION['bookingID']))
{
    if(checksession($conn,$_SESSION['bookingID']) == false )
    {
        $_SESSION['bookingID'] = $_SESSION['bookingID'];
        echo "<script>alert('You will need to complete your last order first before creating the new one')</script>";
        echo "<script>window.location = 'customerIndex.php' </script>";
    }
    else
    {
        if(checkbookinginfo($conn,$_SESSION['bookingID']) == true)
        {
            $totalbooking = "SELECT COUNT(Booking_ID) AS TOTAL FROM booking";
            $result = mysqli_query($conn,$totalbooking);
            $values = mysqli_fetch_assoc($result);
            $num_rows = $values['TOTAL'];
            
            $courierID = "COU1";
            $increment = $num_rows + 1;
            $bookingID = "BKG" . $increment;
            $_SESSION['bookingID'] = $bookingID;
            $sql = "INSERT INTO booking (Booking_ID,Customer_ID,Courier_ID) VALUES ('".$bookingID."' , '".$_SESSION['Customer_ID']."', '".$courierID."') ";
            mysqli_query($conn,$sql);
            echo "<script>alert('Redirecting to product page'); window.location = 'customerIndex.php'</script>";
        }
        else 
        {
            echo "<script>alert('Please confirm your last booking'); window.location = 'customerIndex.php';</script>";
        }
    }

}
else
{
    $totalbooking = "SELECT COUNT(Booking_ID) AS TOTAL FROM booking";
    $result = mysqli_query($conn,$totalbooking);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['TOTAL'];
    
    $courierID = "COU1";
    $increment = $num_rows + 1;
    $bookingID = "BKG" . $increment;
    $_SESSION['bookingID'] = $bookingID;
    $sql = "INSERT INTO booking (Booking_ID,Customer_ID,Courier_ID) VALUES ('".$bookingID."' , '".$_SESSION['Customer_ID']."','".$courierID."') ";
    mysqli_query($conn,$sql);

    echo "<script>alert('Redirecting to product page'); window.location = 'customerIndex.php'</script>";
}

   

?>