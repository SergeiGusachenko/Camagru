<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Camagru</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php" >
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
  	</div>
  	<div class="input-group">
  	  <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"required>
  	</div>
  	<div class="input-group">
  	  <input type="password" placeholder="Password"  name="password_1"required>
  	</div>
  	<div class="input-group">
  	  <input type="password" placeholder="Confirm password" name="password_2"required>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user" style="color:white;">Register</button>
		</div>
		<div class="container">
		<a href="login.php" style="color:lightblue;   right: 20px; ">Sign in</a>
		</div>
</div>
  </form>
</body>
</html>