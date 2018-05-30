<html>
<head>
  <link rel="stylesheet" href="../stylesheets/bootstrap.min.css">
  <script src="../JS/bootstrap.min.js"></script>

<link rel="stylesheet" href="../stylesheets/profile.css">
</head>
<body>
<?php
session_start();    //Establishing the session
$username = @$_SESSION['user'];
$server = "localhost";
$user = "root";
$password = "root";
$dbname = "login";

try{
//Connecting to the MySQL database

$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$select = $conn->prepare("SELECT * FROM credentials WHERE username='{$username}'");
$count = $conn->prepare("SELECT COUNT(*) FROM credentials");
$posts = $conn->prepare("SELECT * FROM posts");

//Executing queries

$select->execute();
$count->execute();
$posts->execute();

//Fetching the results as an array

$record1 = $select->fetch();
$record2 = $count->fetch();
$record3 = $posts->fetchAll();

//Returning a dynamic page as per the user logged in.

if(@$_SESSION['user']!="")
 {
//Bootstrap Navigation Bar

echo "<div class='container'>";
echo "<nav class='navbar navbar-expand-lg nav-light bg-light'>";
  echo "<a class='navbar-brand' href=''></a>";
  echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
  echo "<span class='navbar-toggler-icon'></span>";
  echo "</button>";

  echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
    echo "<ul class='navbar-nav mr-auto'>";
    echo "<li class='nav-item active'>";
      echo "<a class='nav-link btn btn-primary' href='viewprofile.php'>My Profile<span class='sr-only'>(current)</span></a>";
      echo "</li>";
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='#'></a>";
      echo "</li>";
      echo "<li class='nav-item active'>";
      echo "<a class='nav-link btn btn-warning' href='logout.php'>Sign Out &raquo;</a>";
      echo "</li>";
    echo "</ul>";
    echo "<form class='form-inline my-2 my-lg-0' action='find_friends.php' method='post'>";
      echo "<input class='form-control mr-sm-2' type='text' placeholder='Find Friends' required aria-label='Search' name='find_friends'>";
      echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>";
    echo "</form>";
  echo "</div>";
echo "</nav>";
echo "</div>";



if(@$_SESSION['successful_post'])
{
  echo "<script>alert('Successfully posted!!');</script>";
  $_SESSION['successful_post'] = false;
}





// Welcoming the user.

echo "<div class='container-fluid'>";
   echo "<br><br><br><br><br>";
   echo "<div class='jumbotron'>";
   echo "<div id='greeting'>";
   echo "<h1 class='display-1'><center>Welcome, ".$record1['firstname']."</center></h1><br><br>";
   echo "<h2><center>Currently registered users:".$record2[0]."</center></h2>";
   echo "</div>";

   echo "<br><br>";
   echo "<br><br>";

   // Area to post.

echo "<div id='post'>";
   echo "<form action='post.php' id='opinion' method='post'><input type='text' name='title' placeholder='Title' size='15' maxlength='20'><br><br>";
   echo "<textarea rows='3' name='body' placeholder='What is in your mind?'></textarea>";
   echo "<br><br><button class='btn btn-outline-success' type='submit'>Post</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn btn-outline-info' type='reset'>Reset</button></form>";
   echo "</div>";
   echo "</div>";


// Displaying the posts one by one.

echo "<h1 id='posts_title'> Posts </h1>";

if($posts == null)
  echo "<br><center><h2>No posts yet.</h2></center>";

foreach($record3 as $record){
  echo "<div id='fetch_posts'>";
  echo "<h3>". $record['fullname']." </h3>";
  echo "<h2>".$record['title']."</h2>";
  echo "<p>".$record['body']."</p>";
  echo "</div>";
}
echo "</div>";
  }
  else
 {
  echo "<center>You must login to continue<br><br><a href='../index.html'>Login Here</a></center>";
 }
 //Destroying the connection instance.
 $conn = null;
}
catch(PDOException $e){
  echo "Exception " . $e->getMessage();
}
?>

</body>
</html>
