<?php
    include("NewConnection.php");
    session_start();

    $totalproduct = "SELECT COUNT(Product_ID) AS total FROM Product";
    $result = mysqli_query($conn,$totalproduct);
    $values = mysqli_fetch_assoc($result);
    $num_rows = $values['total'];
    $increment = $num_rows + 1;
    $productID = "PR" . $increment;


    $categorybuyer = $_POST['categorybuyer'];
    $productbrandID = $_POST['productbrand'];
    $productsize = $_POST['productsize'];
    $productname = $_POST['productname'];
    $availability = $_POST['productavailability'];
    $price = $_POST['productprice'];
    $sleeves = $_POST['sleevestype'];
    $collar = $_POST['collartype'];

    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        

        $fileExt = explode('.',$fileName);
        $fileActuallExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');

        if(!preg_replace('~[^0-9|^.|(?=2.)]~','',$price) || !is_numeric($price))
        {
            echo "<script language='javascript'> alert('Please insert appropriate number for price'); window.location = 'adminIndex.php'</script>";           
        }
        else if(!is_numeric($availability))
        {
            echo "<script language='javascript'> alert('Please insert appropriate number for availability'); window.location = 'adminIndex.php'</script>";           
        }
        else if(in_array($fileActuallExt, $allowed))
        {
            if($fileError === 0){

                if($fileSize < 50000000)
                {
                    $fileNewName = $fileName.".".$fileActuallExt;//unique id
                    $fileDestination = 'uploads/'.$fileNewName;
                    $_SESSION['namefile'] = $fileNewName;
                    $_SESSION['sourcefile'] = $fileDestination;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "INSERT INTO product (Product_ID,ProductBrand_ID,Admin_ID,CategoryBuyer,ProductName,ProductAvailability,ProductPrice,ProductSize,ColarType, SlevesType,ProductFileName) VALUES('".$productID."','".$productbrandID."','".$_SESSION['Admin_ID']."','".$categorybuyer."','".$productname."','".$availability."','".$price."','".$productsize."','". $collar."','".$sleeves."', '".$fileNewName."')";
                    mysqli_query($conn,$sql);
                    echo "<script language='javascript'> alert('Your file has been uploaded'); window.location ='adminIndex.php';</script>";
                }
                
                else
                {
                    echo "<script language='javascript'> alert('Your file is to big'); window.location = 'adminIndex.php'</script>";
                }
            }
            else
            {
                echo "<script language='javascript'> alert('There was an error while uploading your file'); window.location = 'adminIndex.php';</script>";
            }
        }
        else
        {
            echo "<script language='javascript'> alert('You cannot upload files of this type'); window.location = 'adminIndex.php';</script>";
        }
    }
    
    


    
?>