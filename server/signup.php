<?php
$username = @$_POST['username'];
$password = @$_POST['new_password'];
$confirm_password = @$_POST['confirm_password'];
$email = @$_POST['email'];
$server = "localhost";
$user = "root";
$pass = "root";
$dbname = "login";
/* if($password!=$confirm_password)
{
  header('location:signup.php');
} */
try{
$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$select_query = $conn->prepare("INSERT INTO credentials(username, password, email) VALUES('{$username}', '{$password}', '{$email}')");
$select_query->execute();
header('location:../index.html');
$conn = null;
} catch(PDOException $e){
  echo $e->getMessage();
}
 ?>
