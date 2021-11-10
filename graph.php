

<html>
<head>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
    <div id = "myfirstchart" style = "height: 250px;"></div>
</body>
</html>
<script>
    new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  <?php 
    include("NewConnection.php");

    $sql = "SELECT DISTINCT Product_ID FROM auditView ";
    $result = mysqli_query($conn,$sql);
    $num = 0; 
    $arrayID = array();
    $chart_data = '';

    while($value = mysqli_fetch_assoc($result))
    {
        //echo $value['Product_ID'];
        $arrayID[$num] = $value['Product_ID'];
        $num = $num + 1;
        
    }
    
    $arraylength = count($arrayID);
    //echo $arraylength;
    echo "data: [";
    for($i = 0; $i<$arraylength; $i++)
    {
        $productID = $arrayID[$i];
        //echo $productID;
        

        $sql = "SELECT COUNT(AuditView_ID) AS TOTAL , Product_ID FROM auditview WHERE Product_ID = '".$productID."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);

        if($row > 0)
        {
            $value = mysqli_fetch_assoc($result);
            $total = $value['TOTAL'];
            echo "{product:'".$value['Product_ID']."', value:'".$value['TOTAL']."'}," ;
        }
        

    
    }
    echo "],";
    ?>

  /*data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],*/
  // The name of the data record attribute that contains x-values.
  xkey: 'product',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>