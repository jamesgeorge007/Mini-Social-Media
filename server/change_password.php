<?php

session_start();

if($_SESSION['user']!='')
{
  $conn = mysqli_connect("localhost","root","","login");

  $current = @$_POST['current_password'];
  $new = @$_POST['new_password'];
  $confirm = @$_POST['confirm_password'];

  $query = "SELECT password FROM credentials WHERE username='".$_SESSION['user']."'";
  $fetch = mysqli_query($conn,$query);
  $record = mysqli_fetch_assoc($fetch);
  
  if($current == $record['password'])
{
  if($new != $confirm)
  {
    echo "Passwords do not match!";
  }
  else
   {

   $query = "UPDATE credentials SET password='".$new."' WHERE username='".$_SESSION['user']."'";
   mysqli_query($conn,$query);
   mysqli_close($conn);
   header('location:profile.php');

   }
}
else
{
  header('location:profile.php');
}
}

else
{
  header('location:profile.php');
}
 ?>
