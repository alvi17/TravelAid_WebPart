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
<title>Travel Aid:Login </title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
<div class="row">
  <div class="col-md-10 col-md-push-2">
  <div class="row">
  <div class="col-xs-9 col-md-4"
	<?php
    session_start();
     
    $username = $_POST['userid'];
    $password = $_POST['password'];
	if($username=='user')
	{
		header('Location:admin.php');
	}
    $conn = @mysql_connect("mysql2.000webhost.com","a1424875_alvi", "travel1729aid")or die(mysql_error());
    $db = @mysql_select_db("a1424875_travel",$conn)or die(mysql_error());

    $username = mysql_real_escape_string($username);
    $query = "SELECT id, password FROM User_Table WHERE Id = '$username';";
     
    $result = mysql_query("SELECT * FROM User_Table where Id= '$username' and password='$password'",$conn);
    $row = mysql_fetch_array($result);
	////     echo $username;
	// echo $password;
    if($row==null) // User not found. So, redirect to login_form again.
    {
	mysql_close($conn);
      header('Location: login.php');
    }
     
	else{ // Redirect to home page after successful login.
    session_regenerate_id();
    $_SESSION['sess_user_id'] = $userData['userid'];
    mysql_close($conn);
    session_write_close();
    header('Location: admin.php');
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