<!DOCTYPE html>
<head>


    <link rel="stylesheet" href="../templates/static/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="../templates/static/stylesheets/viewprofile.css">
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
  if($_SESSION['user'] != '') {

  $select_query = $conn->prepare("SELECT * FROM credentials WHERE username='".$_SESSION['user']."'");
  $select_query->execute();
  $result = $select_query->fetchAll();

  $posts_query = $conn->prepare("SELECT title, body FROM posts WHERE username='".$_SESSION['user']."'");
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

if($posts_query == null)
  echo "<h3 style='text-align:center;'>You haven't posted yet!</h3>";

foreach($posts as $record) {
  echo "<div id='posts'>";

  echo "<h2>".$record['title']."</h2>";

  echo "<p>".$record['body']."</p>";

  echo "</div>";
}

echo "<br><center><button type='button' onClick='window.location=../templates/change_password.html'>Change Password</button></center>";
}
else {
 header('location: profile.php');
} $conn = null; 
}catch(PDOException $e){
  echo $e->getMessage();
}
 ?>
      <script src="../templates/static/JS/jquery.js"></script>
     <script src="../templates/static/JS/bootstrap.min.js"></script>
      <script src="../templates/static/JS/viewProfile.js"></script> 
 </body>
 </html>
