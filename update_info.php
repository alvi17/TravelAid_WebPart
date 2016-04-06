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
<title>Travel Aid:Update Info</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
   <div class="col-md-8 col-md-push-3">
   <h4>Update Information</h4>
	<form role="form" id="input" method="post">
	<div class="form-group">
    <label for="exampleInputDate1">Service Name:</label>
    <select class="form-control" name="busservice">
	
	<option value="zero">Select Bus Number</option>
    <?php
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
	$service=mysql_query("select * from BusService",$conn);
	while($row = mysql_fetch_array($service))
	{
	echo "<option value=".$row[0].">".$row[1]."</option>";

	}
	mysql_close($conn);
	
	?>
	
	</select>
	<input type="submit" name="submit" value="Submit" class="btn btn-success">
    </div>
	</form>
	<form role="form" id="input" method="post" >
    <div class="form-group">
    <label for="exampleInputText">Bus Number :</label>
	<select class="form-control" name="busimei">
	<option value="zero">Select Bus IMEI Number</option>
	<?php
	if(isset($_POST['submit']))
	{
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
	$service=mysql_query("select * from Bus Inner Join BusOwner On BusOwner.BusServiceId=".$_POST['busservice']." and Bus.Id=BusOwner.BusId",$conn);
	while($row= mysql_fetch_array($service))
	{
		echo "<option value=".$row[0].">".$row[1]."</option>";
	}	
	}

	mysql_close($conn);
	?>
	</select>
   
	</br>
	<input type="submit" name="submit1" value="Submit" class="btn btn-success">
    </div>

	</form>
	<?php
	if(isset($_POST['submit1'])){
	echo "<form role='form' id='input' method='post' ><div class='form-group'><label for='exampleInputText'>Bus Id:</label><input type='text' class='form-control' id='exampleInputText1' placeholder='Bus Id' name='busid' value='".$_POST['busimei']."'><br><label for='exampleInputText'>Enter New IMEI Number :</label><<input type='text' class='form-control' id='exampleInputText1' placeholder='Enter New IMEI Number' name='newimei'></br><input type='submit' name='submit2' value='Update' class='btn btn-success'></div></form>";
	}
	?>
    </div>
	<?php include 'admin_sidebar.php'?>
</div>
<?php include 'footer.php'; ?>
<?php
if(isset($_POST['submit2']))
{
	
     $conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
     $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
     $service=mysql_query("UPDATE Bus set IMEI='".$_POST['newimei']."'where Id=".$_POST['busid']."",$conn);
	 mysql_close($conn);

}

?>
<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
</script>
</body>
</html>
</head>