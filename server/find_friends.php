<?php
session_start();

if($_SESSION['user']!='')
{
  $friends=$_POST['find_friends'];

  $conn=mysqli_connect("localhost","root","","login");

  $query = "SELECT * FROM credentials WHERE fullname='".$friends."' OR firstname='".$friends."'";
  $fetch = mysqli_query($conn, $query);

  $request = "SELECT fullname FROM credentials WHERE username='".$_SESSION['user']."'";
  $results = mysqli_query($conn, $request);

  $posts_query = "SELECT title, body FROM posts WHERE fullname='".$friends."' OR username='".$friends."'";
  $posts = mysqli_query($conn, $posts_query);

  $array = mysqli_fetch_array($results);

  echo "<br><br>";
  
  while($record = mysqli_fetch_array($fetch))
  {
    if($friends == $array['fullname'])
    {
      echo "<h1><center>It's You!</center></h1><br><br>";
    }

   echo "<center><table border   cellspacing='8' cellpadding='16'>";

   echo "<tr><th><font face='forte' size='36'>Name</font></th><th><font face='forte' size='36'>".$record['fullname']."</font></th></tr>";
   echo "<tr><th><font face='forte' size='36'>E-mail</font></th><th><font face='forte' size='36'>".$record['email']."</font></th></tr>";
   echo "<br><br>";
   echo "</table></center>";
  }


if(mysqli_num_rows($posts) == 0)
  echo "No posts yet.";

while($record = mysqli_fetch_assoc($posts))
{
  echo "<div id='posts'>";

  echo "<h2>".$record['title']."</h2>";

  echo "<p>".$record['body']."</p>";

  echo "</div>";
}

}


mysqli_close($conn);

?>
