<!DOCTYPE html>
<head>


    <link rel="stylesheet" href="../stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/viewprofile.css">
</head>
<body>
<?php
session_start();
try{
  $server = "localhost";
  $user = "root";
  $password = "root";
  $dbname = "login";
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
  if($_SESSION['user']!='') {

  $select_query = "SELECT * FROM credentials WHERE username='".$_SESSION['user']."'";
  $select_query->execute();
  $result = $select_query->fetchAll();

  $posts_query = "SELECT title, body FROM posts WHERE username='".$_SESSION['user']."'";
  $posts_query->execute(); 

  echo "<h1 style='text-align:center; text-decoration:underline;'>Your Profile</h1> <br><br>";

foreach($result as $record) {
    echo "<div id='user-details'>";

echo "<form method='post' action='update.php'>";
echo "<h1>Firstname:</h1>  <input type='text' name='firstname' disabled id='firstName' value ='{$record['firstname']}' ><br><br>";
echo "<h1>Lastname:</h1> <input type='text' name='lastname'disabled id='lastName' value ='{$record['lastname']}'><br><br>";
echo "<h1>Username:</h1> <input type='text' name='username' disabled value ='{$record['username']}'><br><br>";
echo "<h1>E-mail:</h1> <input type='email' name='email' disabled value ='{$record['email']}'>";

echo "<br><br><button type='submit' id='updateBtn'> Update </button>";
echo "<button type='button' id='cancelBtn'> Cancel </button>";

echo "<button type='button' id='editBtn'> Edit </button>"; 

echo "</form>";

  echo "</div>";
}


echo "<h1 style='text-align:center; text-decoration:underline;> Your posts </h1>";

if($posts_query->rowCount == 0)
  echo "<h3 style='text-align:center;'>You haven't posted yet!</h3>";

foreach($posts as $record) {
  echo "<div id='posts'>";

  echo "<h2>".$record['title']."</h2>";

  echo "<p>".$record['body']."</p>";

  echo "</div>";
}

echo "<br><center><a href='../HTML/change_password.html'><button type='button'>Change Password</button></a></center>";
}
else {
 header('location:profile.php');
} }catch(PDOException $e){
  echo $e->getMessage();
}
$conn = null;
 ?>
      <script src="../JS/jquery.js"></script>
     <script src="../JS/bootstrap.min.js"></script>
      <script src="../JS/viewProfile.js"></script> 
 </body>
 </html>
