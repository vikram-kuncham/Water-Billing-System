<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where id='$id'");

$result1 = mysqli_query($conn,"SELECT * FROM slab where sl_no=1");
$result2 = mysqli_query($conn,"SELECT * FROM slab where sl_no=2");
$result3 = mysqli_query($conn,"SELECT * FROM slab where sl_no=3");

$row1 = mysqli_fetch_row($result1);
$row2 = mysqli_fetch_row($result2);
$row3 = mysqli_fetch_row($result3);

$rng1 = $row1[1];
$rng2 = $row2[1];
$rng3 = $row3[1];
$cost1 = $row1[2];
$cost2 = $row2[2];
$cost3 = $row3[2];

$c1=($rng1) * ($cost1);
$c2=$c1+(($rng2-$rng1) * $cost2);
$c3=$c2+(($rng3-$rng2) * $cost3);

$row = mysqli_fetch_row($result);
  
$prev = $row[2];
$owners_id = $row[1];
$pres = $row[3];
$price = $row[4];
$totalcons = $pres - $prev;
	  if ($totalcons<$rng1)
    {
      $bill = $totalcons*$cost1;
    }
    elseif($totalcons<$rng2)
    {
      $bill = $c1+(($totalcons-$rng1)*$cost2);
    }
    else
    {
      $bill = $c2+(($totalcons-$rng2)*$cost3);
    }
	  $date = $row[1];
 
  

?>

<?php
  
include 'db.php';
$id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM owners WHERE id  = '$owners_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$lname= $test['lname'] ;					
				$fname=$test['fname'] ;
				$mi=$test['mi'] ;
				$address=$test['address'] ;
				$contact=$test['contact'] ;
//$result = mysqli_query($conn,"SELECT * FROM bill where id=$id");
//$row = mysqli_fetch_row($result);
?>
<html>
<head><title>Smart Utilities</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
<script>
function printDiv(data) {
      var printContents = document.getElementById('data').innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
</head>
<body style=" background-size:cover; font-family:'Courier New', Courier;">
<style type="text/css">
#data { margin: 0 auto; width:700px; padding:20px; border:#066 thin ridge; height:600px; }

</style>
<div id="data">
<center>
<h4><center><b>Water Billing System</b></center></h4>
<p>ONE INDIA ONE PIPELINE</p>
<p><strong>BILL PAID RECEIPT</strong></p>
<p>Phone: +91 7349533461 / 9482536764</p>
<!--<i style="text-align:right; margin-left:250px;">Date: <?php echo $date; ?></i>-->
</center>
<div id="context">
<table class="table table-striped table-bordered">
<tr><td>Last Name:</td><td><b><i><?php echo $lname; ?></i></b></td><td>Client ID</td><td><i>SMART/00<?php echo $id; ?></i></td> </tr>
<tr><td>First Name</td><td><b><i><?php echo $fname; ?></td><td bordercolor="#000000">Meter Number</td><td><?php echo $mi; ?></td></tr>

<tr><td>Address: </td><td><b><i><?php echo $address; ?></td></tr>
<tr><td bordercolor="#000000">Contact: </td><td><b><i><?php echo $contact; ?></td></tr>
<?php $txn=($row[0]*1000)+2;?>
<tr><td bordercolor="#000000">TRANSACTION ID: </td><td><b><i><?php echo "$txn"; ?></td></tr>
<tr><td bordercolor="#000000">Previous Reading :</td><td><b><i> <?php echo $prev;?> </td><td bordercolor="#000000">Present Reading : </td><td><b><i><?php echo $pres; ?> </td></tr>
<tr><td bordercolor="#000000">Consuption: </td><td><b><i><?php echo $totalcons;?> </td><td bordercolor="#000000">Price: </td>
<td><b><i><?php echo $bill; ?>&nbsp; </td>
</tr>
<tr><td colspan="4"><center><h2>Total Invoice:<b><i> <?php echo "Rs. $bill"; ?><b><i></h2></center></td></tr>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['name'];

  }
?>
<tr><td>Casher:<?php echo $sessionname;?></td><td>Signature:_____________</td></tr>

 
</table>



</div>
</div>
<CENTER><button type="button"  class="btn btn-default " onclick="printDiv(data)"><span
class=" glyphicon glyphicon-print"></span>&nbsp;Print Bill</button>&nbsp;<a href="bill.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go back</button></a></CENTER>
</body>
</html>