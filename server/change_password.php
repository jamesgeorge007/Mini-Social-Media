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

    $current = @$_POST['current_password'];
    $new = @$_POST['new_password'];
    $confirm = @$_POST['confirm_password'];

    $query = "SELECT password FROM credentials WHERE username='".$_SESSION['user']."'";
    $query->execute();
    $record = $query->fetch();
  
    if($current == $record['password']){
      if($new != $confirm){
      echo "Passwords do not match!";
      } else{
        $query = "UPDATE credentials SET password='".$new."' WHERE username='".$_SESSION['user']."'";
        mysqli_query($conn,$query);
        mysqli_close($conn);
        header('location:profile.php');
      }
  }}
  catch(PDOException $e){
      echo $e->getMessage();
  }
}
else{
  header('location:profile.php');
}

 ?>
