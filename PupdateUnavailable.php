<?php 
    include("NewConnection.php");
    $productID = $_POST['productID'];
    $sql = "UPDATE product SET ProductAvailability = 0 WHERE Product_ID = '".$productID."'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Product has been update to be not available'); window.location = 'UpdateProduct.php';</script>"
?>