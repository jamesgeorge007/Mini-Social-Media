<?php
session_start();
$username=@$_POST['username'];
$password=@$_POST['password'];
$conn=mysqli_connect("localhost","root","","login");
$select="SELECT * FROM credentials WHERE username='".$username."'";
$query=mysqli_query($conn,$select);
$record=mysqli_fetch_array($query);
if($record==0)
{
  header('location:../HTML/signup.html');
}
else if($username==$record['username'] && $password==$record['password'])
{
  $_SESSION['user']=$username;
  header('location:profile.php');
}
else
{
  header('location:../HTML/wrong_password.html');
}
mysqli_close($conn);





 ?>
