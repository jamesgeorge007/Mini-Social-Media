<?php
session_start();

if($_SESSION['user']!='')
{
  $friends=$_POST['find_friends'];
  $conn=mysqli_connect("localhost","root","","login");
  $query="SELECT * FROM credentials WHERE fullname='".$friends."'";
  $fetch=mysqli_query($conn,$query);
  $request="SELECT fullname FROM credentials WHERE username='".$_SESSION['user']."'";
  $results=mysqli_query($conn,$request);
  $array=mysqli_fetch_array($results);
  echo "<br><br><center>";
  echo "<table border   cellspacing='8' cellpadding='16'>";
  while($record=mysqli_fetch_array($fetch))
  {
    if($friends==$array['fullname'])
    {
      echo "<h1>It's You!</h1><br><br>";
    }
   echo "<tr><th><font face='forte' size='36'>Name</font></th><th><font face='forte' size='36'>".$record['fullname']."</font></th></tr>";
   echo "<tr><th><font face='forte' size='36'>E-mail</font></th><th><font face='forte' size='36'>".$record['email']."</font></th></tr>";
  }
  echo "</table></center>";
}
if($record==0)
{
  header('profile.php');
}
else
{
  header('location:profile.php');
}




 ?>
