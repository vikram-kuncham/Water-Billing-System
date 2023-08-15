<?php
 session_start();
 

include 'db.php';    
  
 $login = mysqli_query($conn,"SELECT * FROM client WHERE username = '" .$_POST['username'] . "' and password = '" .$_POST['password'] . "'");
 $row=mysqli_fetch_array($login);  
 
 if($row){
 $_SESSION['id'] = $row['id'];

 echo '<script>windows: location="payment.php"</script>';
 }
	else {
		header ("location: index2.php?err");
		}
 
 
?>
