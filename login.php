<?php 
	include('server.php');
	include('resetpwd.php');
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="main.js"></script>
</head>
<body>
<div class="header">
  	<h2>Camagru </h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label style="color:white;">Username</label>
  		<input type="text" name="username" required>
  	</div>
  	<div class="input-group" >
  		<label style="color:white;">Password</label>
  		<input type="pwd" name="pwd">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user" style="color:black;">Login</button>
  		<button type="submit" class="btn" name="reset_pwd" style="color:black;">Forget Passwort ?</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>  
</body>
</html>