<?php
session_start();

try{
  if(@$_SESSION['user']!='')
  {
    $server = "localhost";
    $user = "root";
    $password = "root";
    $dbname = "login";
    $username = @$_SESSION['user'];
    $title = @$_POST['title'];
    $body = @$_POST['body'];

    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT fullname FROM credentials WHERE username='".$_SESSION['user']."' ");
    $query->execute();
    $name = $query->fetch();
    $insert_query=$conn->prepare("INSERT INTO posts VALUES ('".$title."', '".$body."', '".$username."', '".$name[0]."')");
    $insert_query->execute();

    $_SESSION['successful_post'] = true;

    header('location: profile.php'); 
    } else {
      echo "<center>You must login to continue<br><br><a href='../HTML/index.html'>Login Here</a></center>";
      }
    $conn = null;  
} catch(PDOException $e){
        echo $e->getMessage();
}

 ?>
