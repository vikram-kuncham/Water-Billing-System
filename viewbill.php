<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
</head>

<h4>Note: Bill Amount = Total Consumption * Price/unit<br />&copy; 2016</h4>
<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where owners_id='$id'");

$result1 = mysqli_query($conn,"SELECT * FROM slab where sl_no=1");
$result2 = mysqli_query($conn,"SELECT * FROM slab where sl_no=2");
$result3 = mysqli_query($conn,"SELECT * FROM slab where sl_no=3");

$row1 = mysqli_fetch_row($result1,);
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

$r1=json_encode($row1);
$r2=json_encode($row2);
$r3=json_encode($row3);

echo "<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>Id</th>
<th>Previous Reading</th>
<th>Present Reading</th>
<th>Consuption</th>
<th>Price</th>
<th>Date</th>
<th>Status</th>
<th>Bill Amount</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
    $status=$row['Status'];
	  $totalcons=$pres - $prev;
	  if ($totalcons<$rng1)
    {
      $bill=$totalcons*$cost1;
    }
    elseif($totalcons<$rng2)
    {
      $bill=$c1+(($totalcons-$rng1)*$cost2);
    }
    else
    {
      $bill=$c2+(($totalcons-$rng2)*$cost3);
    }
    

    

  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $prev . "</td>";
  echo "<td>" . $pres . "</td>";
  echo "<td>". $totalcons."</td>";
  echo "<td>" . $price . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>". $status."</td>";
  echo "<td>" . $bill . "</td>";
 echo "<td><a rel='facebox' href='viewpayment.php?id=".$row['id']."'><span class=\"glyphicon glyphicon-eye-open\">View </a>| ";
 echo "<a rel='facebox' href='delbill.php?id=".$row['id']."'>Del</td>";
  echo "</tr>";
  }
echo "</table>";

?>

</html>
