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
<title>Travel Aid:Insert New Bus Service</title>
</head>

<body>
<div class="container">
    <?php include_once('header.php'); ?>
	
<div class="row">
   <div class="col-md-8 col-md-push-3" id="newhead">
    <h4>Insert New Bus Service</h4>
	<form role="form" method="post" action="insert_newServiceCheck.php">
    <div class="form-group">
    <label for="exampleInputText1">Company Name :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Company Name" name="companyname">
    </div>
	<div class="form-group">
    <label for="exampleInputDate1">Route:</label>
	
	<select class="form-control" name="route">
	
	<option value="zero">Select Route</option>
    <?php
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
	$service=mysql_query("select * from Route",$conn);
	while($row = mysql_fetch_array($service))
	{
	echo "<option value=".$row[0].">".$row[1]."-".$row[2]."</option>";

	}
	mysql_close($conn);
	
	?>
	
	</select>
	</input>
    </div>
	<input type="submit" value="Submit" class="btn btn-success" style="margin-left:30%;width:20%">
	</form>
		
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
