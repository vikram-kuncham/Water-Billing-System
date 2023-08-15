<?php
 session_start();
 
$id=$_SESSION['idd'];
echo "$id";
include 'db.php';    
  
 $login = mysqli_query($conn,"UPDATE BILL SET `STATUS`='PAID' WHERE id=$id");
 //$row=mysqli_fetch_array($login); 
 
 /*if($row){
 $_SESSION['id'] = $row['id'];

 echo '<script>windows: location="billing.php"</script>';
 }
	else {*/
		header ("location: payment.php?err");
		//}
 
 
?>
