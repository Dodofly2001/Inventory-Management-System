<?php 
    include("NewConnection.php"); 
    session_start();
    $courier = $_POST['courier'];
    $bookingID = $_POST['bookingID'];
    //echo $courier . " ";
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d');
    $time = date('H:i:s');
    //echo $date . " ";
    //echo $time . " " ;

    function checkitemselected($conn,$bookingID)
    {
        $except = false;
        $sql = "SELECT * FROM bookingdetail WHERE Booking_ID = '".$bookingID."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if($row > 0)
        {
            $except = true;
        }

        return $except;

    }

    if(checkitemselected($conn,$bookingID) == false)
    {
        echo "<script>alert('Please select your item to complete the booking confirmation'); window.location = 'Booking.php'</script>";
    }
    else
    {
        $_SESSION['bookingID'] = $bookingID;
        $sql = "UPDATE booking SET Courier_ID = '".$courier."', BookingTime = '".$time."', BookingDate = '".$date."' WHERE Booking_ID = '".$bookingID."' ";
        mysqli_query($conn, $sql);
        require_once('PHPMailer/PHPMailerAutoload.php');

        $customerID = $_SESSION['Customer_ID'];

        $sql = "SELECT CustomerEmail FROM customer WHERE Customer_ID = '".$customerID."'";
        $result = mysqli_query($conn,$sql);
        $values = mysqli_fetch_assoc($result);
        $customerEmail = $values['CustomerEmail']; 
        $customerEmail = strval($customerEmail);
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure ='ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'seventeenbundlebooking@gmail.com';
        $mail->Password = 'hariz1234';
        $mail->SetFrom('no-reply@howcode.org');
        $mail->Subject = 'Booking Item';
        
        $sql = "SELECT * FROM bookingdetail WHERE Booking_ID = '".$bookingID."'";
        $result =  mysqli_query($conn,$sql);
        while($values = mysqli_fetch_assoc($result))
        {
            $productID = $values['Product_ID'];
            $quantity = $values['QuantityProduct'];
            
            $sql2 = "SELECT ProductAvailability FROM product WHERE Product_ID = '".$productID."'";
            $result2 = mysqli_query($conn,$sql2);
            $values2 = mysqli_fetch_assoc($result2);
            $quantity2 = $values2['ProductAvailability'];

            $latestquantity = $quantity2 - $quantity;

            $sql3 = "UPDATE Product SET ProductAvailability = '".$latestquantity."' WHERE Product_ID = '".$productID."'";
            $result3 = mysqli_query($conn,$sql3);
        }
        

        $myfile = fopen("testfile.txt", "w");
        $count = 1;
        $totalpay = 0;
        $sql = "SELECT * FROM bookingdetail WHERE Booking_ID = '".$bookingID."'";
        $result =  mysqli_query($conn,$sql);
        fwrite($myfile, "SeventeenBundleBooking System" );
        while($row = mysqli_fetch_assoc($result))
        {
            $productID = $row['Product_ID'];
            $sqlname = "SELECT ProductName AS PRODUCTNAME FROM product WHERE Product_ID = '".$productID."' ";
                
            $resultname = mysqli_query($conn,$sqlname);
            $valuesname = mysqli_fetch_assoc($resultname);
            $productName = $valuesname['PRODUCTNAME'];
                
            $productQuantity = $row['QuantityProduct'];
            $productID = $row['Product_ID'];

            $sqlprice = "SELECT ProductPrice AS PRICE FROM product WHERE Product_ID = '".$productID."'";
            $resultprice = mysqli_query($conn,$sqlprice);
            $valuesprice = mysqli_fetch_assoc($resultprice);

            $productPrice = $valuesprice['PRICE']; 
            $total = $productQuantity * $productPrice;

            
        
            fwrite($myfile,"\n\nProduct No:".$count);
           
            fwrite($myfile,"\nProduct Name : ".$productName);
          
            fwrite($myfile,"\nProduct Price : ".$productPrice);
            
            fwrite($myfile,"\nProduct Quantity : ".$productQuantity);
            
            fwrite($myfile,"\nTotal : ".$total);

            $count = $count+1 ;
            $totalpay = $totalpay + $total;
        }
        fwrite($myfile, "\nTotal to pay : RM".$totalpay.".00");
        fclose($myfile);


        $sql = "SELECT Customer_ID FROM booking WHERE Booking_ID = '".$bookingID."'";
        $result = mysqli_query($conn,$sql);
        $value = mysqli_fetch_assoc($result);
        $customerID = $value['Customer_ID'];

        $sql = "SELECT CustomerName FROM customer WHERE Customer_ID = '".$customerID."'";
        $result = mysqli_query($conn,$sql);
        $value = mysqli_fetch_assoc($result);
        $customerName = $value['CustomerName'];

        $body = "
                <p>1.This email contain your booking information from the booking that has been made.</p>
                <p>2.Please <strong>verify</strong> the content of the file that has been attached.</p> 
                <p>3.<strong>Upload</strong> your proof payment into the system.</p>
                <p>Please bank in the payment to this account : </p>
            
                <strong>
                <p>Bank Name : Maybank </p>
                <p>Account Number: 164810200232</p>
                <p>AHMAD HARIZ BIN ABDUL ALIM</p>
                <strong>

                <p><strong>Booking ID: ".$bookingID."</strong></p>
                <p><strong>Customer Name: ".$customerName."</strong><p>";

        $filelocation = './testfile.txt';
        $mail->Addattachment($filelocation,'Detail Booked Product.txt');
        $mail->Body = $body;
        $mail->AddAddress($customerEmail);
        $mail->Send();
        echo "<script>alert('Your booking has been confirmed, Please upload the payment receipt and check your email'); window.location = 'ViewBookedProduct.php'; </script>";
        unset($_SESSION['bookingID']);

        
        
    }


   

?>