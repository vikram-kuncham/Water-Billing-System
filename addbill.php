<?php
include 'db.php';
	
	$owners_id = $_POST['owners_id'];
	$prev = $_POST['prev'];
	$pres = $_POST['pres'];
	$totalcun = $pres - $prev;
	$price = $_POST['price'];
	$pricetotal = $totalcun * $price;
	$date=$_POST['date'] ;
	
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

	if (isset($totalcun)<$rng1){
      $bill=$totalcun*$cost1;
    }
    elseif($totalcun<$rng2){
      $bill=$c1+(($totalcun-$rng1)*$cost2);
    }
    else{
      $bill=$c2+(($totalcun-$rng2)*$cost3);
    }
$pricetotal=$bill;

	mysqli_query($conn,"INSERT INTO  bill (owners_id,prev,pres,price,date) 
		 VALUES ('$owners_id','$prev','$pres','$pricetotal','$date')"); 

mysqli_query($conn,"DELETE FROM bill where owners_id=0");
		 
	mysqli_query($conn,"UPDATE tempo_bill SET Prev = '$pres' where id ='$owners_id'");
				
				echo '<script>alert("success")</script>';
				echo '<script>windows: location="bill.php"</script>';
?>
	