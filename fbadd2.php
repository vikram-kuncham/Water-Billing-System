<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
include 'db.php';
					$owner_id= $_POST['ownid'] ;					
					$feedbk=$_POST['fbck'] ;
					
        mysqli_query($conn,"INSERT INTO  feedback (owners_id,feedback) 
		 VALUES ($owner_id,$feedbk)"); 

		 echo '<script>alert("success")</script>';
				echo '<script>windows: location="feedback.php"</script>';}
				
				
				
				