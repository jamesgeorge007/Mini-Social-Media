<?php

session_start();

try{
  $server = "localhost";
  $user = "root";
  $password = "root";
  $dbname = "login";
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
  if($_SESSION['user'] != '') {
  
  $firstName = @$_POST['firstname'];
  $lastName = @$_POST['lastname'];
  
  $query1 = "UPDATE credentials SET firstname ='".$firstName."' WHERE username = '".$_SESSION['user']."' ";
  $query1->execute();
  $query2 = "UPDATE credentials SET lastname = '".$lastName."' WHERE username = '".$_SESSION['user']."' ";
  $query2->execute();
  header('location: viewprofile.php');
} else {
  header('location:profile.php');
  }
}catch(PDOException $e){
    echo $e->getMessage();
  }
 $conn = null; 
?>