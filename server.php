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
    //Continue registration.
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  //create token for email verified

  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // first check the database to make sure 
  // a user does not already exist with the same use
    //rname and/or email
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
  	$password = md5($password_1);//encrypt the password before saving in the database
    $token = bin2hex(openssl_random_pseudo_bytes(16));    

    // Mail 
    // Mail 
    // Mail 
    $link = "http://localhost:8100/index.php?t=$token&id=$id";
    $message = '
        To finalyze your subscribtion please click the link below 
        '.$link.'
    ';
    mail( $_POST['email'] ,"Camagru",$message);
    //
  	$query = "INSERT INTO users (username, email, token, password) 
  			  VALUES('$username', '$email', '$token','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
  /// Check token 
  /// Check token 
  /// Check token 
  if(isset($_GET['token']) && isset($_GET['id'])){
    $token = trim($_GET['token']);
    $userId = trim($_GET['id']);
    $sql = "SELECT COUNT(*) AS num FROM users WHERE id = :id AND token = :token";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['num'] == 1){
      array_push($errors, "GREAT JOB");
        //Token is valid. Verify the email address
    } else{
      array_push($errors, "NOT GREAT");
      
        //Token is not valid.
    }
}
}
// ... 
// ... 
// ... 
// ... 
// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
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