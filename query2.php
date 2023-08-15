<?php session_start(); ?>
<?php
  //include 'db.php';
//$owner_id =$_REQUEST['id'];

//$result = mysqli_query($conn,"SELECT * FROM owners WHERE id  = '$owner_id'");
//$test = mysqli_fetch_array($result);
//if (!$result) 
//		{
//		die("Error: Data not found..");
//		}
//				$id=$test['id'] ;
//				$lname= $test['lname'] ;					
//				$fname=$test['fname'] ;
//				$mi=$test['mi'] ;
//				$address=$test['address'] ;
//				$contact=$test['contact'] ;

//$q = mysqli_query($conn,"select Prev from tempo_bill where Client = '$fname'");
//$results = mysqli_fetch_array($q);
//$previous = $results['Prev'];
?>

<p><h1>Place</h1></p>
 <!--<h1>Name: <?php// echo $lname.'&nbsp;' .$fname.'&nbsp;'.$mi;?></h1>-->
<p><?php $date=date('y/m/d H:i:s');
 //echo $date;?></p>
 <form method="post" action="qry2.php">
 <table width="346" border="1">
  <tr>
  <input type="hidden" name="owners_id" value="<?php echo $id; ?>" />
  <input type="hidden" name="date" value="<?php echo $date; ?>" />
    <td width="118">Place:</td>
    <td width="66"><input type="text" name="place" /></td>
    <td></td>
   <tr>
    <td><input type="submit" name="total" value="OKAY"  /></td>
  </tr>
</table>
</form>