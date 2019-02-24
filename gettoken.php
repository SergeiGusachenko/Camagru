<?php
$db = mysqli_connect('localhost', 'root', 'root', 'registration');
if(isset($_GET['token'])){
  $token = mysqli_real_escape_string($db, $_GET['token']);
  $query = "SELECT * FROM users WHERE token='$token'";
  $results = mysqli_query($db, $query);
   if(mysqli_num_rows($results) == 1){
    header('location: index.php');    
    } else{
      header('location: unsucces.php');
    } 
}
?>