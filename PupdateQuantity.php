<?php 
    include("NewConnection.php");
    $productID = $_POST['productID'];
    $quantity = $_POST['NewQuantity'];
    if($quantity == " ")
    {
        echo "<script>alert('Please enter appropriate number for value update'); window.location = 'UpdateProduct.php';</script>";
    }
    else if(!is_numeric($quantity))
    {
        echo "<script>alert('Please enter appropriate number for value update'); window.location = 'UpdateProduct.php';</script>";
    }
    else 
    {   
        $sql = "SELECT ProductAvailability FROM product WHERE Product_ID = '".$productID."'";
        $result = mysqli_query($conn,$sql);
        $value = mysqli_fetch_assoc($result);
        $currentquantity = $value['ProductAvailability'];
        $newquantity = $currentquantity + $quantity;
        $sql = "UPDATE Product SET ProductAvailability = '".$newquantity."' WHERE Product_ID  = '".$productID."'";
        mysqli_query($conn,$sql);
        echo "<script>alert('Product Availability has been update'); window.location = 'UpdateProduct.php';</script>";
    }
    //echo $productID;
    //echo $quantity;
    
    ?>