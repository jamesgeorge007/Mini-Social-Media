<?php
session_start();

if($_SESSION['user'] != ''){
  $friends = $_POST['find_friends'];
  $server = "localhost";
  $user = "root";
  $password = "root";
  $dbname = "login";
  try{
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = $conn->prepare("SELECT * FROM credentials WHERE fullname='".$friends."' OR firstname='".$friends."'");
  $query->execute();

  $request = $conn->prepare("SELECT fullname FROM credentials WHERE username='".$_SESSION['user']."'");
  $request->execute();

  $posts_query = $conn->prepare("SELECT title, body FROM posts WHERE fullname='".$friends."' OR username='".$friends."'");
  $posts_query->execute();

  $array = $request->fetchAll();
  $posts = $posts_query->fetchAll();

  echo "<br><br>";
  
  foreach($array as $record)
  {
    if($friends == $record['fullname'])
    {
      echo "<h1><center>It's You!</center></h1><br><br>";
    }

   echo "<center><table border   cellspacing='8' cellpadding='16'>";

   echo "<tr><th><font face='forte' size='36'>Name</font></th><th><font face='forte' size='36'>".$record['fullname']."</font></th></tr>";
   echo "<tr><th><font face='forte' size='36'>E-mail</font></th><th><font face='forte' size='36'>".$record['email']."</font></th></tr>";
   echo "<br><br>";
   echo "</table></center>";
  }


if($posts_query == null)
  echo "No posts yet.";

foreach($posts as $record){
  echo "<div id='posts'>";

  echo "<h2>".$record['title']."</h2>";

  echo "<p>".$record['body']."</p>";

  echo "</div>";
}
  $conn = null;
  } catch(PDOException $e){
    echo $e->getMessage();
  }
}
?>
