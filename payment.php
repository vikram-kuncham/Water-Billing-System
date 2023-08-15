<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
$result1 = mysqli_query($conn,"SELECT * FROM bill where owners_id= '$session'");
$row2 = mysqli_fetch_row($result1);
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['name'];

  }

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css"  href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing System</title>
<style type="text/css">
#wrapper{
 width:100%;
 margin:0 auto;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:2%;
 padding:10px;
 height:550px;
}
#header { width:900px; height:100px;}
table th {background:#999;}
#form {
width:400px;
float:left;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:5%;
	
}
#ryt {
float:right;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:5%;
}
#header ul li{
	list-style:none;
	float:left; margin-top:30px; margin-left:10px;}
</style>
</head>

<body>
<div class="container">
<div id="wrapper">
  <h1><center><b>Water Billing System</b></center></h1>
  <div style="color:#F00; font-size:12px; margin-left:900px;"> 
  <span><?php?></span><a href="index2.php"><span class="btn btn-danger  glyphicon glyphicon-log-out">&nbsp;Logout</span></a>
  </div>
 
<hr color="#999999" />
<div  style="overflow:scroll; height:350px;">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <!-------- home panel ----------------------------->
      
      
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5>Billing Sequence</h5></div>
            </div>
              <div class="panel-body">
            
               <?php
include 'db.php';
$session=$_SESSION['id'];
//echo"$session";
$result30 = mysqli_query($conn,"SELECT * FROM owners where id=$session");
$row30 = mysqli_fetch_array($result30);
$name30=$row30[2];
$result = mysqli_query($conn,"SELECT * FROM owners where id=$session");
$result1 = mysqli_query($conn,"SELECT * FROM bill where owners_id= '$session'");

echo "<table class=\"table\" bgcolor=\"#003399\">
<tr>
<th>Bill ID</th>
<th>Amount</th>
<th>Status</th>
<th>Action</th>
</tr>";

echo "WELCOME $name30";

while(($row = mysqli_fetch_array($result)))
  {
  while($row2 = mysqli_fetch_array($result1)){
  if($row2[1]==$row['id']){
  echo "<tr>";
  echo "<td>" . $row2['id'] . "</td>";
  echo "<td>" . $row2[4] . "</td>";
  echo "<td>" . $row2[6] . "</td>";
  if ($row2[6]=='NOT PAID'){
    echo "<td><a  href='pay2.php?id=".$row2['id']."'><span class=\"glyphicon glyphicon-eye-open\">PAY </a>| ";
 //echo "<td><a  href='paymentPage.php?id=".$row2['id']."'><span class=\"btn btn-info btn-xs glyphicon glyphicon-usd\">PAY</span> </a> ";
  }
  if ($row2[6]!='NOT PAID'){
    echo "<td><a  href='pay3.php?id=".$row2['id']."'><span class=\"glyphicon glyphicon-eye-open\">RECEIPT </a>| ";
 //echo "<td><a  href='paymentPage.php?id=".$row2['id']."'><span class=\"btn btn-info btn-xs glyphicon glyphicon-usd\">PAY</span> </a> ";
  }
  echo "</tr>";
  }}}
echo "</table>";
?>

              
              </div>
           </div>
         </div>
      </div>
    </div>
   <!-----  ######################################### -->
   

</div>
</body>

</html>
 <script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
