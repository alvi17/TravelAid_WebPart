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
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
	$service=mysql_query("select *  from BusService",$conn);
		
	while($row= mysql_fetch_array($service)){
		
		
						if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black;'>
				 <tr class='danger'><th>Bus Services </th></tr>";
				 $i=2;
				 
				 }
				 echo
				 "<tr class='success'><td><a href='bus_info.php?name=".$row[0]."' role='button' style='width:100%'>".$row[1]."</a></td></tr>";
		
	    }
				echo "</table>";
		$i=1;
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
