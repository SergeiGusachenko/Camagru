<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<div class="header">
  	<h2>Camagru login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">

  		<input type="text" name="username" placeholder="Username">
  	</div>
  	<div class="input-group">
  		<input type="password" name="password" placeholder="Password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user" style="color:white;">Login</button>
  	</div>
  	<p>
  	<a href="register.php" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white;">Sign up</a>
  	</p>
	  <a href="forget.php" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white;">Forget Password ?</a>
  </form>  
</body>
</html>