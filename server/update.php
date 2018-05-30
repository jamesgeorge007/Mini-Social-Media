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
    $fullName = $firstName + $lastName;
  
    $query1 = $conn->prepare("UPDATE credentials SET firstname ='".$firstName."' WHERE username = '".$_SESSION['user']."' ");
    $query1->execute();
    $query2 = $conn->prepare("UPDATE credentials SET lastname = '".$lastName."' WHERE username = '".$_SESSION['user']."' ");
    $query2->execute();
    $query3 = $conn->prepare("UPDATE credentials SET fullname = '".$fullName."' WHERE username = '".$_SESSION['user']."' ");
    $query3->execute();
    header('location: viewprofile.php');
    $conn = null; 
    }  else {
    header('location: profile.php');
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  } 
?>