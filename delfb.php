<?php session_start(); ?>
<?php
 include 'db.php';
$id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM feedback WHERE owners_id  = '$id'");
$test = mysqli_fetch_row($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test[0] ;
			

?>
<form action="delfbexec.php" method="post">
<p>Are you sure you want to delete this record!</p>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="submit" nsme="ok" value="Delete">
</form>