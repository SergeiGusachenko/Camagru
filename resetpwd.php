<?php
    $db = mysqli_connect('localhost', 'root', 'root', 'registration');
 if (isset($_POST['reset_pwd'])) {   
    $pwd = rand(999,99999);
    $password_hash = md5($pwd);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $sql = "SELECT * FROM `users` WHERE username = '$username'";
    $res = mysqli_query($db, $sql);
    $count = mysqli_num_rows($res);
    echo "<script type='text/javascript'>alert('We sent a new password to your email');</script>";    
    if($count == 1){
      $r = mysqli_fetch_assoc($res);
      $usql = "UPDATE `users` SET pwd='$password_hash' WHERE username='$username'";
      $result = mysqli_query($db, $usql);
      if($result){
      $subject = "Your Recovered Password";
      $message = "Please use this password to login " . $pwd;
      if(mail($r['email'], "Camagru", $message)){
        echo "<script type='text/javascript'>alert('Password succesfully updated);</script>";    
      }else{
        echo "<script type='text/javascript'>alert('User with this name does't exist);</script>";    
      }
    }
  }
}
?>