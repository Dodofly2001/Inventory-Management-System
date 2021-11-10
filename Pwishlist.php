<?php 
session_start();
include("NewConnection.php");
$productID = $_POST['productID'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];


if(isset($_SESSION['newwishlist']))
{
   // $_SESSION['oldwishlist'] = $_SESSION['newwishlist'];
    $item_array_id = array_column($_SESSION['newwishlist'], 'product_id');
    if(!in_array($productID,$item_array_id))
    {
        $count = count($_SESSION['newwishlist']);
        $item_array = array(
            'product_id' => $productID,
            'product_name' =>$productName,
            'product_price' =>$productPrice
            
        );
        $_SESSION['newwishlist'][$count] = $item_array;
        print_r($_SESSION['newwishlist']);
        echo "<script>window.location = 'Wishlist.php';</script>";
        
    }
    else 
    {
        echo "<script>alert('Item already added'); window.location = 'Wishlist.php';</script>";
    }
    
}
else 
{
    
    $item_array  = array (
        'product_id' => $productID,
        'product_name' =>$productName,
        'product_price' =>$productPrice
    );
    $_SESSION['newwishlist'][0] = $item_array;
    

    echo "<script>window.location = 'Wishlist.php'</script>";
    
}

?>