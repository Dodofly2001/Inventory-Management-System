<?php 
include("NewConnection.php");
session_start();
$courier  = "NULL";

$totalbooking = "SELECT COUNT(Booking_ID) AS TOTAL FROM booking";
$result = mysqli_query($conn,$totalbooking);
$values = mysqli_fetch_assoc($result);
$num_rows = $values['TOTAL'];

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


if(isset($_SESSION['bookingID']))
{
    if(checksession($conn,$_SESSION['bookingID'])== false )
    {
        $_SESSION['bookingID'] = $_SESSION['bookingID'];
        echo "<script>alert('You will need to complete your last order first before creating the new one')</script>";
        echo "<script>window.location = 'customerIndex.php' </script>";
    }
    else
    {
        echo "<script>var choice = confirm('Are you sure, you want to create new order? You still can proceed with the previous order');" ;
        echo "if (choice == true) {" ;
            $sqlcancel = "DELETE FROM bookingdetail WHERE Booking_ID = '".$_SESSION['bookingID']."'";
            mysqli_query($conn,$sqlcancel);
            $sqlcancel2 = "DELETE FROM booking WHERE Booking_ID = '".$_SESSION['bookingID']."'";
            mysqli_query($conn,$sqlcancel2);

            $totalbooking = "SELECT COUNT(Booking_ID) AS TOTAL FROM booking";
            $result = mysqli_query($conn,$totalbooking);
            $values = mysqli_fetch_assoc($result);
            $num_rows = $values['TOTAL'];
            $increment = $num_rows + 1;
            $bookingID = "BKG" . $increment;
            $_SESSION['bookingID'] = $bookingID;
            $sql = "INSERT INTO booking (Booking_ID,Customer_ID) VALUES ('".$bookingID."' , '".$_SESSION['Customer_ID']."') ";
            mysqli_query($conn,$sql);
            echo "alert('New order created');";
            echo "alert('Redirecting to product page'); window.location = 'customerIndex.php'";
        echo "}";
        echo "else {";
            $_SESSION['bookingID'] = $_SESSION['bookingID'];
            echo "alert('Using previous order and the order will be reset');";
            echo "alert('Redirecting to product page'); window.location = 'customerIndex.php';";
        echo "}</script>";
        
    }
    
}
else 
{
    $increment = $num_rows + 1;
    $bookingID = "BKG" . $increment;
    $_SESSION['bookingID'] = $bookingID;
    $sql = "INSERT INTO booking (Booking_ID,Customer_ID) VALUES ('".$bookingID."' , '".$_SESSION['Customer_ID']."') ";
    mysqli_query($conn,$sql);

    echo "<script>alert('Redirecting to product page'); window.location = 'customerIndex.php'</script>";
}















/*function checkbookingID($conn)
{
    $found = false;
    $sql = "SELECT Booking_ID FROM bookingdetail WHERE Booking_ID IN (SELECT Booking_ID from booking) ";
    $qry = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($qry);

    if($row > 0)
    {
        $found = true;
    }
    return $found;
}*/




/*
if(checkbookingID($conn) == false)
{   
    $totalbooking = "SELECT COUNT(Booking_ID) AS TOTAL from booking";
    $result = mysqli_query($conn,$totalbooking);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['TOTAL'];
    $increment = $num_rows + 1;
    $bookingID = "BKG" . $increment;
    //echo "in if";
    $sql = "INSERT INTO booking (Booking_ID,Customer_ID,Courier_ID) VALUES ('".$bookingID."' , '".$_SESSION['Customer_ID']."', '".$courier."') ";
    mysqli_query($conn,$sql);
    
    echo "<script>alert('New booking order created');</script>";
    $_SESSION['bookingID'] = $bookingID;
    echo "<script>alert('Redirecting to product page'); window.location = 'customerIndex.php'</script>";
}
else
{
    //echo "in else";
    $totalbooking = "SELECT COUNT(Booking_ID) AS TOTAL from booking";
    $result = mysqli_query($conn,$totalbooking);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['TOTAL'];
    $increment = $num_rows + 1;
    $bookingID = "BKG" . $increment;
    
    $sql = "INSERT INTO booking (Booking_ID,Customer_ID,Courier_ID) VALUES ('".$bookingID."' , '".$_SESSION['Customer_ID']."', '".$courier."') ";
    mysqli_query($conn,$sql);
    $_SESSION['bookingID'] = $bookingID;
}*/






?>