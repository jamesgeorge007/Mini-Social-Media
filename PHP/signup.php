<?php
$username=@$_POST['username'];
$password=@$_POST['new_password'];
$confirm_password=@$_POST['confirm_password'];
$firstname=@$_POST['firstname'];
$lastname=@$_POST['lastname'];
$email=@$_POST['email'];
if($password!=$confirm_password)
{
  header('signup.php');
}
$conn=mysqli_connect("localhost","root","","login");
$select="INSERT INTO credentials VALUES('".$username."','".$password."','".$firstname."','".$lastname."','".$email."')";
$query=mysqli_query($conn,$select);
mysqli_close($conn);
header('location:../HTML/index.html');


 ?>
