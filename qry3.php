<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM feedback where owners_id= '$session'");

while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row[0];
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
  <span><?php ?></span><a href="logout.php"><span class="btn btn-danger  glyphicon glyphicon-log-out">&nbsp;Logout</span></a>
  </div>
  <ul class="nav nav-pills">
    <li><a href="billing.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
    <li><a href="bill.php"><span class="glyphicon glyphicon-usd"></span>&nbsp;Billing</a></li>
    <li class="btn btn-default btn-xs"><a href="user.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Users</a></li>
    <li><a href="clients.php"><span class="glyphicon glyphicon-list"></span>&nbsp;Clients</a></li>
  </ul>
<hr color="#999999" />
<!--<div  style="overflow:scroll; height:350px;">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">-->
    <!-------- home panel ----------------------------->
      
      
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5>System Users</h5><a rel='facebox' href="addfb.php" ><button type="button" class="btn btn-primary btn-xs">Add Feedback</button></a>
            </div>
              <div class="panel-body">

<?php 

?>
<?php
include 'db.php';
$date1=date('y/m/d H:i:s');
$date2=date('y/m/d H:i:s');
$date1 =$_REQUEST['date1'];
$date2 =$_REQUEST['date2'];
echo "$date1   $date2";
$result=mysqli_query($conn,"SELECT * FROM bill,owners where date <= '$date2' and date >= '$date1' and owners_id=owners.id");

echo "<table  class=\"table\" bgcolor='#fff'>
<tr>
<th>Id</th>
<th>First Name</th>
<th>Address</th>
<th>Date</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
 
  

?>

<?php
  
include 'db.php';


?>
<div><button onClick="window.print()">Print
</button></div>
</div>
<html>
<head><title>Smart Utilities</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
<script>
function printDiv(data) {
      var printContents = document.getElementById('data').innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
</head>
<body style=" background-size:cover; font-family:'Courier New', Courier;">
<style type="text/css">
#data { margin: 0 auto; width:700px; padding:20px; border:#066 thin ridge; height:600px; }

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

