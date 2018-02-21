<?php
session_start();

if(@$_SESSION['user']!='')
{

  $user = @$_SESSION['user'];
  $title = @$_POST['title'];
  $body = @$_POST['body'];


  $conn = mysqli_connect("localhost","root","","login");
  $name_query = "SELECT fullname FROM credentials WHERE username='".@$_SESSION['user']."' ";
  $result = mysqli_query($conn, $name_query);  
  $name = mysqli_fetch_array($result);
  $query="INSERT INTO posts VALUES ('".$title."', '".$body."', '".$user."', '".$name[0]."')";
  mysqli_query($conn, $query);
  mysqli_close($conn);

  @$_SESSION['successful_post'] = true;

 header('location: profile.php');
}
else
 {
  echo "<center>You must login to continue<br><br><a href='../HTML/index.html'>Login Here</a></center>";
 }


 ?>
