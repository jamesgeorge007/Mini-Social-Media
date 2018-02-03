<?php
session_start();

if(@$_SESSION['user']!='')
{

  $user = @$_SESSION['user'];
  $title = @$_POST['title'];
  $body = @$_POST['body'];


  $conn=mysqli_connect("localhost","root","","login");
  $query="INSERT INTO posts VALUES ('".$title."', '".$body."', '".$user."')";
  mysqli_query($conn, $query);
  mysqli_close($conn);

  echo "<h1><center>Successfully posted!</center></h1>";
}
else
 {
  echo "<center>You must login to continue<br><br><a href='../HTML/index.html'>Login Here</a></center>";
 }


 ?>
