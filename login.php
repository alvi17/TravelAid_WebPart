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
  <div class="col-xs-9 col-md-4">
  <form role="form" method="post" action="login_check.php">
  <div class="form-group">
    <label for="exampleInputText">User Id</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter UserId" name="userid">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
	<input type="submit" value="Login" class="btn btn-success">
</form>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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