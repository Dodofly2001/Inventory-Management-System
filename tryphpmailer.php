<?php
    include("NewConnection.php");
    require_once('PHPMailer/PHPMailerAutoload.php');
    $customeremail = "afiqmuhaimin211188@gmail.com";
    $customeremail = strval($customeremail);
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure ='ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML(true);
    $mail->Username = 'seventeenbundlebooking@gmail.com';
    $mail->Password = 'hariz1234';
    $mail->SetFrom('no-reply@howcode.org');
    $mail->Subject = 'Booking Item';


    $bookingID = "BKG3";
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

        echo "\nProduct no :" .$count;
      
        fwrite($myfile,"\n\nProduct No:".$count);
        echo "\n".$productName. "\n";
        fwrite($myfile,"\nProduct Name : ".$productName);
        echo $productPrice;
        fwrite($myfile,"\nProduct Price : ".$productPrice);
        echo $productQuantity . "\n";
        fwrite($myfile,"\nProduct Quantity : ".$productQuantity);
        echo $total . "\n";
        fwrite($myfile,"\nTotal : ".$total);

        $count = $count+1 ;
        $totalpay = $totalpay + $total;
    }
    fwrite($myfile, "\nTotal to pay : RM".$totalpay.".00");
    fclose($myfile);
    
 



    $body = "<p>Output testing:<p>";
    $filelocation = './testfile.txt';
    $mail->Addattachment($filelocation,'Detail Booked Product.txt');
   
    /*if(file_exists($template_file))
    {
        $mailContent = $body;
    }
    else 
    {
        die("Unable to locate the template file");
    }
    */
    echo $body;
    
    $mail->Body = $body;
    $mail->AddAddress($customeremail);
    $mail->Send();
?>