<?php
    
    include("NewConnection.php");
    $myfile = fopen("testfile.txt", "w");
    $count = 1;
    $totalpay = 0;
    $bookingID = "bookingIDforchange";
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

?>