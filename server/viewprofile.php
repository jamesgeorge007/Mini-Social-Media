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

echo "<h1 style='text-align:center; text-decoration:underline;'>Your Profile</h1> <br><br>";

while($record = mysqli_fetch_array($query))
  {
    echo "<div id='user-details'>";

echo "<form method='post' action='update.php'>";
echo "<h1>Firstname:</h1>  <input type='text' name='firstname' value='{$record['firstname']}'><br><br>";
echo "<h1>Lastname:</h1> <input type='text' name='lastname' value='{$record['lastname']}'><br><br>";
echo "<h1>Username:</h1> <input type='text' name='username' value='{$record['username']}'><br><br>";
echo "<h1>E-mail:</h1> <input type='email' name='email' value='{$record['email']}'>";
echo "<br><br><button type='submit'> Update Profile </button>";
echo "</form>";

  echo "</div>";
}


echo "<h1 style='text-align:center; text-decoration:underline;> Your posts </h1>";

if(mysqli_num_rows($posts_query) == 0)
  echo "<h3 style='text-align:center'>You haven't posted yet!</h3>";

while($record = mysqli_fetch_assoc($posts_query))
{
  echo "<div id='posts'>";

  echo "<h2>".$record['title']."</h2>";

  echo "<p>".$record['body']."</p>";

  echo "</div>";
}

echo "<br><center><a href='../HTML/change_password.html'><button type='button'>Change Password</button></a></center>";
}
else
{
 header('location:profile.php');
}
mysqli_close($conn);
 ?>
 </body>
 </html>
