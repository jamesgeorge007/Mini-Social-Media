<?php
  session_start();
  $username = @$_POST['username'];
  $password = @$_POST['password'];
  $server = "localhost";
  $user = "root";
  $pass = "root";
  $dbname = "login";
  try{
    if($_SESSION['user'] == ''){
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $select_query = $conn->prepare("SELECT * FROM credentials WHERE username = '".$username."'");
  $select_query->execute();
  $record = $select_query->fetch();
  if($record == null){
    header('location:../html/signup.html');
  } else if($username == $record[0] && $password == $record[1]){
      $_SESSION['user'] = $username;
      header('location:profile.php');
      } else{
        header('location:../templates/wrong_password.html');
      }
  $conn = null;      
    } else{
      header('location:profile.php');
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }      
?>
