<?php session_start(); ?>
<?php
 include 'db.php';
$id = $_REQUEST['id'];
$result1 = mysqli_query($conn,"SELECT * FROM bill WHERE id  = '$id'");
$row1=mysqli_fetch_row($result1);

mysqli_query($conn,"DELETE from bill WHERE id='$id'");
echo "<script>windows: location='bill.php'</script>";
?>
<!--<form action="bill.php" method="post">
<h1>Are you sure you want to delete this record <?php //echo $lname; ?></h1>
<input type="hidden" name="id" value="<?php //echo $id; ?>" />
<input type="submit" name="ok" value="Delete">
</form>-->