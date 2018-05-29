<?php
  session_start();
  $username = @$_POST['username'];
  $password = @$_POST['password'];
  $server = "localhost";
  $user = "root";
  $password = "root";
  $dbname = "login";
  try{
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $select_query = "SELECT * FROM credentials WHERE username='".$username."'";
  $select_query->execute();
  $record = $select_query->fetch();
  if($record == 0){
    header('location:../HTML/signup.html');
  } else if($username==$record['username'] && $password==$record['password']){
      $_SESSION['user']=$username;
      header('location:profile.php');
      } else{
        header('location:../html/wrong_password.html');
        }
  }catch(PDOException $e){
    echo $e->getMessage();
  }      
  $conn = null;
?>
