<?php
    include("NewConnection.php");
    session_start();
    $bookingID = $_POST['bookingID'];
    $paymentgive = $_POST['paymentgive'];

    $totalupload = "SELECT COUNT(ProofPayment_ID) AS TOTAL FROM proofpayment";
    $result = mysqli_query($conn,$totalupload);
    $value = mysqli_fetch_assoc($result);
    $nums_rows = $value['TOTAL'];
    $increment = $nums_rows + 1;
    $proofpaymentID = "PFP" . $increment;

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $paymentstatus = "On-Going";
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

        if(!preg_replace('~[^0-9|^.|(?=2.)]~','',$paymentgive) || !is_numeric($paymentgive))
        {
            echo "<script language='javascript'> alert('Please insert appropriate number for price'); window.location = 'StartNewOrder.php';</script>";      
            echo "1";     
        }
        else if(in_array($fileActuallExt, $allowed))
        {
            if($fileError === 0){

                if($fileSize < 50000000)
                {
                    $fileNewName = $fileName.".".$fileActuallExt;
                    $fileDestination = 'proofpayment/'.$fileNewName;
                    $_SESSION['namefile'] = $fileNewName;
                    $_SESSION['sourcefile'] = $fileDestination;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "INSERT INTO proofpayment (ProofPayment_ID, Booking_ID, ProofPaymentStatus ,DateProofPayment, TimeProofPayment, TotalPaymentGive, ProofPaymentFileType) VALUES('".$proofpaymentID."', '".$bookingID."','".$paymentstatus."' ,'".$date."', '".$time."', '".$paymentgive."', '".$fileNewName."')";
                    mysqli_query($conn,$sql);
                    echo"3";
                    echo "<script language='javascript'> alert('Your file has been uploaded'); window.location ='StartNewOrder.php';</script>";
                }
                
                else
                {
                    echo "4";
                    echo "<script language='javascript'> alert('Your file is to big'); window.location = 'StartNewOrder.php';</script>";
                }
            }
            else
            {   echo "5";
                echo "<script language='javascript'> alert('There was an error while uploading your file'); window.location = 'StartNewOrder.php';</script>";
            }
        }
        else
        {   
            echo "6";
            echo "<script language='javascript'> alert('You cannot upload files of this type'); window.location = 'StartNewOrder.php';</script>";
        }
    }
    
?>