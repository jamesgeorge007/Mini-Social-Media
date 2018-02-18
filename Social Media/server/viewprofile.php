<!DOCTYPE html>
<head>

    <link rel="stylesheet" href="../stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/viewprofile.css">
    <script src="../JS/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
if($_SESSION['user']!='')
{
$conn=mysqli_connect("localhost","root","","login");

$select = "SELECT * FROM credentials WHERE username='".$_SESSION['user']."'";
$query=mysqli_query($conn, $select);

$posts = "SELECT title, body FROM posts WHERE username='".@$_SESSION['user']."'";
$posts_query = mysqli_query($conn, $posts);

echo "<h1 style='text-align:center'>Your Profile</h1><a href='profile.php'><button type='button' style='text-align:center;'>Go Back</button></a><br><br>";

while($record = mysqli_fetch_array($query))
  {
    echo "<div id='user-details'>";

echo "<hr><h1>Firstname: ".$record['firstname']."</h1>";
echo "<hr><h1>Lastname: ".$record['lastname']."</h1>";
echo "<hr><h1>Username: ".$record['username']."</h1>";
echo "<hr><h1>E-mail: ".$record['email']."</h1>";

  echo "</div>";
}


echo "<h1 style='text-align:center'> Your posts </h1>";

if(mysqli_num_rows($posts_query) == 0)
  echo "<h3 style='text-align:center'>You haven't posted yet!</h3>";

while($record = mysqli_fetch_assoc($posts_query))
{
  echo "<div id='posts'>";

  echo "<h2>".$record['title']."</h2>";

  echo "<p>".$record['body']."</p>";

  echo "</div>";
}


echo "<br><center><a href='../HTML/update.html'><button type='button'>Edit Profile</button></a><br><br><br>";
echo "<a href='../HTML/change_password.html'><button type='button'>Change Password</button></a></center>";
}
else
{
 header('location:profile.php');
}
mysqli_close($conn);
 ?>
 </body>
 </html>
