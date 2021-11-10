<?php
$dbuser = "root";//php variable
$dbpass = "";
$dbhost = "localhost:3307";//always localhost:3307 not localhost only
$dbname = "asg_isp250 new";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!isset($conn))
{
    echo "Connection is not ok";// print variable echo
}
else 
{
    echo "hahahahhah connection is okay";
}

$query = "SELECT * FROM productbrand";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

echo $row['ProductBrand_ID'];
?>
<html>
    <head></head>
<body>
    
</body>
</html>