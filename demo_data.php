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
<title>Travel Aid:Insert New Bus</title>
</head>

<body>
<div class="container">
    <?php 
	global $company;
	include_once('header.php'); ?>
	
<div class="row">
   <div class="col-md-8 col-md-push-3" id="newhead">
    <h4>Insert New Bus Information</h4>
	<form role="form" method="post" >   
   <div class="form-group">
    <label for="exampleInputText1">Bus Id:</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Bus Id" name="busid" >
    </div>
	<div class="form-group">
    <label for="exampleInputDate1">Lattitude:</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="lattitude" name="lattitude">
    </div>
	<div class="form-group">
    <label for="exampleInputText1">Longitude:</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="longitude" name="longitude">
    </div>

	<input type="submit" value="Submit" name="submit" class="btn btn-success" style="margin-left:30%;width:20%">
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

<?php
//insert into Location Table,BusLocation Table,Time in millseconds
 $company;
function display()
{
    //connect to database
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());    
	$time = round(microtime(true) * 1000);
	//insert into Location Table
    $result = mysql_query("INSERT INTO Location(Lattitude,Longitude,Time) Values('".$_POST['lattitude']."','".$_POST['longitude']."','".$time."')",$conn);
	
	//retrive LocationId
	
	$service1=mysql_query("select Id from Location where Lattitude='".$_POST['lattitude']."' and Longitude='".$_POST['longitude']."'",$conn);
	$row=mysql_fetch_array($service1);
	//insert into BusLocation
	
	$insertvalue=mysql_query("INSERT INTO BusLocation(LocationId,BusId) Values('".$row[0]."','".$_POST['busid']."')",$conn);
	//close database connection
	mysql_close($conn);
	//redirection
	if($insertvalue){
	echo '<script language="javascript">';
	echo 'alert("Data successfully Inserted")';
	echo '</script>';
	
	   
	}
	else
	{
	echo '<script language="javascript">';
	echo 'alert("Error in Inserting Data Please Try again")';
	echo '</script>';
	
	}
}
if(isset($_POST['submit']))
{

   display();
} 
?>


</body>
</html>
