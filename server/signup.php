<?php
$username = @$_POST['username'];
$password = @$_POST['new_password'];
$confirm_password = @$_POST['confirm_password'];
$email = @$_POST['email'];
$server = "localhost";
$user = "root";
$password = "root";
$dbname = "login";
/* if($password!=$confirm_password)
{
  header('signup.php');
} */
try{
$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
$select_query = "INSERT INTO credentials(username, password, email) VALUES('".$username."','".$password."','".$email."')";
$select_query->execute();
header('location:../index.html');
} catch(PDOException $e){
  echo $e->getMessage();
}
$conn = null;
 ?>
