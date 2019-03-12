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
</head>
<body>
<div class="header">
  	<h2>Camagru </h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label style="color:white;">Username</label>
  		<input  style="color:black;" type="text" name="username" required>
  	</div>
  	<div class="input-group" >
  		<label style="color:white;">Password</label>
  		<input style="color:black;" type="pwd" name="pwd">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user" style="color:white;">Login</button>
  		<button type="submit" class="btn" name="reset_pwd" style="color:white;">Forget Passwort ?</button>
  	</div>
  	<p style="color:white;">
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>  
  <script>
  window.addEventListener('keydown',function(e){
	  const audio = document.querySelector(`audio[data-key="{$e.keyCode}"]`);
	  const key   = document.querySelector(`.key[data-key="{$key.code}"]`)
	  audio.play();
	  key.classList.add('playing');
	  key.classList.triggle('playing');

	console.log(audio);

  });
  </script>
</body>
</html>