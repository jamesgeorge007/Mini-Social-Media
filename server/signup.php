<?php
$username=@$_POST['username'];
$password=@$_POST['new_password'];
$confirm_password=@$_POST['confirm_password'];
$email=@$_POST['email'];
/* if($password!=$confirm_password)
{
  header('signup.php');
} */
$conn=mysqli_connect("localhost","root","root","login");
$select="INSERT INTO credentials(username, password, email) VALUES('".$username."','".$password."','".$email."')";
$query=mysqli_query($conn,$select);
mysqli_close($conn);
header('location:../index.html');


 ?>
