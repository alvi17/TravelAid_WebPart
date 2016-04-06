<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.css" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="main.css" />
<script src="jquery.js"></script>

<script src="bootstrap-3.1.1-dist/js/bootstrap.js"></script>
<script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
<title>Travel Aid:View Info</title>
</head>

<body>
<div class="container">
    <?php 
	global $company;
	include_once('header.php'); ?>
	
<div class="row">
   <div class="col-md-8 col-md-push-3" id="newhead">
   
	<?php
	$i=1;
	$stopages;
	$id=$_GET['name'];
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
	$serve=mysql_query("select Name from BusService where Id=".$id."",$conn);
	$serveName=mysql_fetch_array($serve);
	echo "<h2>".$serveName[0]."</h2>";
	$service=mysql_query("select distinct Route.Id,Route.StartingLocation,Route.FinishLocation  from Route,BusRoute,BusService where Route.Id=BusRoute.RouteId and BusRoute.BusServiceId=".$id."",$conn);
	echo "<h4>Bus Route</h4>";

	while($row= mysql_fetch_array($service)){
				global $stopages;
				$busno=mysql_query("SELECT count(*) FROM Bus,BusRoute,BusOwner WHERE Bus.Id=BusOwner.BusId and BusOwner.BusServiceId=BusRoute.BusServiceId and BusRoute.RouteId=".$row[0]."",$conn);
				
				$bus=mysql_fetch_array($busno);
				if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black;'>
				 <tr class='danger'><th>Start Location </th><th>Finish Location</th><th>Number of Bus</th></tr>";
				 $i=2;
				 
				 }
				 echo
				 "<tr class='active'><td>".$row[1]."</td><td>".$row[2]."</td><td>".$bus[0]."</td></tr>";
				}
				echo "</table>";
	
	
	$servebus=mysql_query("select IMEI from Bus,BusOwner,BusService where Bus.Id=BusOwner.BusId and BusService.Id=BusOwner.BusServiceId and BusService.Id=".$id."",$conn);
		echo "<h4>Bus on Service</h4>";
		echo "<ul class='list-group '>
	<li class='list-group-item-heading list-group-item-danger'>IMEI Number </li>";
	while($row1=mysql_fetch_array($servebus))
	{

	echo "<li class='list-group-item list-group-item-success'>".$row1[0]." </li>";
	}
	
	echo "</ul>";	
	mysql_close($conn);
	
	?>
    </div>
	
	<?php include 'admin_sidebar.php'?>
	</br></br>
</br>
  </div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
</script>
</body>
</html>
