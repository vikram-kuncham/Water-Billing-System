<body>
<center><h1>Add Feedback</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table width="200" border="1">
  <tr>
    <td>Owner ID:</td>
    <td><input type="text" name="oid" /></td>
  </tr>
  <tr>
    <td>Feedback:</td>
    <td><input type="text" name="fbck" /></td>
  </tr>
    <td><input type="submit" name="ok" value="Add"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
 
</form>




<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
include 'db.php';
					$owner_id= $_POST['oid'] ;					
					$feedbk=$_POST['fbck'] ;
					
        mysqli_query($conn,"INSERT INTO  feedback (owners_id,feedback) VALUES ('$owner_id','$feedbk')"); 

		 echo '<script>alert("success")</script>';
				echo '<script>windows: location="feedback.php"</script>';}
?>			
</center>			
				
				