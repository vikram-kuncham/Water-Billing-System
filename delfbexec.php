<?php
include 'db.php';
	$id = $_POST['id'];
	mysqli_query($conn,"DELETE from feedback WHERE owners_id='$id'");
			

		 echo "<script>windows: location='feedback.php'</script>";				
			