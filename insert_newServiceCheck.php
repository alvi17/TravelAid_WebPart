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
<title>Travel Aid:Insert New BusService </title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
<div class="row">
  <div class="col-md-10 col-md-push-2">
  <div class="row">
  <div class="col-xs-9 col-md-4"
	<?php
 
     
    $servicename = $_POST['companyname'];
    $route = $_POST['route'];
	//echo "<br>".$servicename ."<br/>Route ".$route;
    $conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());

    
    $query = "";
     
    $result = mysql_query("INSERT INTO BusService(Name) Values('".$servicename."')",$conn);
	$service=mysql_query("select Id from BusService where Name='".$servicename."'",$conn);
	$row = mysql_fetch_array($service);
	echo $row[0] ."hello route";
	$insertvalue=mysql_query("INSERT INTO BusRoute(RouteId,BusServiceId) Values(".$route.",".$row[0].")",$conn);
	
	
 //   $row = mysql_fetch_array($result);
	// echo $username;
	// echo $password;    
	// Redirect to home page after successful login.
    mysql_close($conn);
	if($insertvalue){
		echo '<script language="javascript">';
		echo 'alert("Data successfully Inserted")';
		echo '</script>';
    header('Location: admin.php');
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Error in Inserting Data.Please Try Again")';
		echo '</script>';
		header('Location:insert_newService.pnp');
	}
    
	?>

 </div>
 </div>
 </div>
	
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
   </script>
</body>
</html>