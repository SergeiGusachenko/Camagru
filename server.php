<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pwd_1 = mysqli_real_escape_string($db, $_POST['pwd_1']);
  $pwd_2 = mysqli_real_escape_string($db, $_POST['pwd_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($pwd_1)) { array_push($errors, "Password is required"); }
  if ($pwd_1 != $pwd_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $token = bin2hex(openssl_random_pseudo_bytes(16));
  	$pwd = md5($pwd_1);//encrypt the password before saving in the database
   $link = "http://localhost:8888/gettoken.php?token=$token";
    $message = '
        To finalyze your subscribtion please click the link below 
        '.$link.'
    ';
    mail( $_POST['email'] ,"Camagru",$message);
  	$query = "INSERT INTO users (username, email, token ,pwd) 
  			  VALUES('$username', '$email','$token', '$pwd')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    echo "<script type='text/javascript'>alert('Plese check your gmail to confirm registration');</script>";
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($pwd)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $pwd = md5($pwd);
        $query = "SELECT * FROM users WHERE username='$username' AND pwd='$pwd'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  ?>