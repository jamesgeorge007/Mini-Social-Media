<?php

session_start();

if($_SESSION['user'] != '')
{
  $conn = mysqli_connect("localhost", "root", "root", "login");

  $firstName = @$_POST['firstname'];
  $lastName = @$_POST['lastname'];


$query1 = "UPDATE credentials SET firstname ='".$firstName."' WHERE username = '".$_SESSION['user']."' ";

mysqli_query($conn, $query1);

$query2 = "UPDATE credentials SET lastname = '".$lastName."' WHERE username = '".$_SESSION['user']."' ";

mysqli_query($conn, $query2);

mysqli_close($conn);

header('location: viewprofile.php');
}

else
{
  header('location:profile.php');
}

?>