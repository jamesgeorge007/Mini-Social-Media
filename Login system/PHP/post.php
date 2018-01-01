<?php
session_start();

if @$_SESSION['user']!=''
{
  $conn=mysqli_connect("localhost","root","","login");
  $query="INSERT INTO posts VALUES";

}
else
 {
  echo "<center>You must login to continue<br><br><a href='../HTML/index.html'>Login Here</a></center>";
 }


 ?>
