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
  <span><?php echo $sessionname;?></span><a href="logout.php"><span class="btn btn-danger  glyphicon glyphicon-log-out">&nbsp;Logout</span></a>
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

include 'db.php';
//$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill , owners where bill.owners_id = owners.id order by price,bill.id asc");

$result1 = mysqli_query($conn,"SELECT * FROM slab where sl_no=1");
$result2 = mysqli_query($conn,"SELECT * FROM slab where sl_no=2");
$result3 = mysqli_query($conn,"SELECT * FROM slab where sl_no=3");

$row1 = mysqli_fetch_row($result1,);
$row2 = mysqli_fetch_row($result2);
$row3 = mysqli_fetch_row($result3);

$rng1 = $row1[1];
$rng2 = $row2[1];
$rng3 = $row3[1];
$cost1 = $row1[2];
$cost2 = $row2[2];
$cost3 = $row3[2];

$c1=($rng1) * ($cost1);
$c2=$c1+(($rng2-$rng1) * $cost2);
$c3=$c2+(($rng3-$rng2) * $cost3);

$r1=json_encode($row1);
$r2=json_encode($row2);
$r3=json_encode($row3);

echo "<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>Id</th>
<th>BILL Id</th>
<th>Name</th>
<th>Date</th>
<th>Amount</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
	  if ($totalcons<$rng1)
    {
      $bill=$totalcons*$cost1;
    }
    elseif($totalcons<$rng2)
    {
      $bill=$c1+(($totalcons-$rng1)*$cost2);
    }
    else
    {
      $bill=$c2+(($totalcons-$rng2)*$cost3);
    }
  
  mysqli_query($conn,"UPDATE  BILL SET price=$bill where id=$row[0]");
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>".$row[0]."</td>";
  echo "<td>".$row['fname']."</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
 //echo "<td><a rel='facebox' href='viewpayment.php?id=".$row['id']."'><span class=\"glyphicon glyphicon-eye-open\">View </a>| ";
// echo "<a rel='facebox' href='delbill.php?id=".$row['id']."'>Del</td>";
  echo "</tr>";
  }
echo "</table>";


?>
<div><button onClick="window.print()">Print
</button></div>
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
