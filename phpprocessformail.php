<?php 
    include("NewConnection.php");
    $sql = "SELECT * FROM bookingdetail WHERE Booking_ID = 'BKG1'";
    $result =  mysqli_query($conn,$sql);
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

        echo "<tr><td>".$productName."</td><td>".$productPrice."</td><td>".$productQuantity."</td><td>".$total."</td></tr>";
    }
?>