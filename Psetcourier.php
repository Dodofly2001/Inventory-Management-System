<?php 
include("NewConnection.php");

$couriername = $_POST['Namecourier'];
$sql = "SELECT COUNT(Courier_ID) AS total FROM Courier";
$result = mysqli_query($conn,$sql);
$values = mysqli_fetch_assoc($result);
$num_rows = $values['total'];
$increment = $num_rows + 1;
$courierID = "COU" . $increment;

function checkcouriername($conn, $couriername)
{
    $found = false;
    $sql = "SELECT CourierName FROM courier WHERE CourierName = '".$couriername."'";
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


if(checkcouriername($conn, $couriername) == true)
{
    echo "<script language ='JavaScript'> alert('The courier already exist in database'); window.location = 'adminIndex.php';</script>";
}
else if(is_numeric($couriername))
{
    echo "<script language ='JavaScript'> alert('Please enter appropriate name for the courier'); window.location = 'adminIndex.php'; </script>";
}
else {
    $sql = "INSERT INTO courier (Courier_ID,CourierName) VALUES ('".$courierID."','".$couriername."')";
    mysqli_query($conn,$sql);
    echo "<script language = 'JavaScript'>alert('The courier has been successfully inserted'); window.location = 'adminIndex.php'</script>";
}

?>