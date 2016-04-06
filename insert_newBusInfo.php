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
    <label for="exampleInputText1">Company Name :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Company Name" name="cname" value="<?php
	global $company;
	$company=$_POST['busservice'];
	$conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());
	$service=mysql_query("select Name  from BusService where Id=".$company."",$conn);
	$row= mysql_fetch_array($service);	
	echo $row[0];
	?>">
    </div>
	<div class="form-group">
    <label for="exampleInputDate1">IMEI:</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="IMEI" name="imei">
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
 $company;
function display()
{
    $conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());    
    $result = mysql_query("INSERT INTO Bus(IMEI) Values('".$_POST['imei']."')",$conn);
	$service1=mysql_query("select Id from Bus where IMEI='".$_POST['imei']."'",$conn);
	
	$row = mysql_fetch_array($service1);
	$service2=mysql_query("select Id from BusService where Name='".$_POST['cname']."'",$conn);
	$row2=mysql_fetch_array($service2);
	
	$insertvalue=mysql_query("INSERT INTO BusOwner(BusServiceId,BusId) Values(".$row2[0].",".$row[0].")",$conn);
	mysql_close($conn);
	if($insertvalue){
	   header('Location: admin.php');
	}
	else
	{
	header('Location: insert_newBus.php');
	}
}
if(isset($_POST['submit']))
{

   display();
} 
?>


</body>
</html>
