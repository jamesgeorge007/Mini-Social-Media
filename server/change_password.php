<?php

session_start();

if($_SESSION['user']!=''){
  $server = "localhost";
  $user = "root";
  $password = "root";
  $dbname = "login";

    try{
    // Connecting to the MySQL database.
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $current_password = @$_POST['current_password'];
    $new_password = @$_POST['new_password'];
    $confirm_password = @$_POST['confirm_password'];

    $query = $conn->prepare("SELECT password FROM credentials WHERE username='".$_SESSION['user']."'");
    $query->execute();
    $record = $query->fetch();
  
    if($current_password == $record['password']){
      if($new_password != $confirm_password){
      echo "Passwords do not match!";
      } else{
        $query = $conn->prepare("UPDATE credentials SET password='".$new_password."' WHERE username='".$_SESSION['user']."'");
        $query->execute();
        header('location:profile.php');
      }
    }
  $conn = null;
  } catch(PDOException $e){
      echo $e->getMessage();
  }
}
else{
  header('location:profile.php');
}

 ?>
