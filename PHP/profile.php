<?php
session_start();    //Establishing the session
$username=@$_SESSION['user'];
//Connecting to the MySQL database
$conn=mysqli_connect("localhost","root","","login");
$select="SELECT * FROM credentials WHERE username='".$username."'";
$count="SELECT COUNT(*) FROM credentials";
//Executing queries
$query1=mysqli_query($conn,$select);
$query2=mysqli_query($conn,$count);
//Fetching the results as an array
$record1=mysqli_fetch_array($query1);
$record2=mysqli_fetch_array($query2);

if(@$_SESSION['user']!="")
 {
   echo "<html>";
   echo "<head>";
   //Bootstrap CDN
   echo "<link rel='stylesheet' href='https:maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' integrity='sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M' crossorigin='anonymous'>";
   echo "<script src='https:maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js' integrity='sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1' crossorigin='anonymous'></script>";
  //echo "<link rel='stylesheet' href='https:maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
   //echo "<script src='https:maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";



//Linking external CSS file
  // echo "<link rel='stylesheet' href='../CSS/profile.css'>";
   echo "<title>Profile</title>";
   echo "</head>";

   echo "<body>";
//Bootstrap Navigation Bar



echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
  echo "<a class='navbar-brand' href=''>Navbar</a>";
  echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
  echo "<span class='navbar-toggler-icon'></span>";
  echo "</button>";

  echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
    echo "<ul class='navbar-nav mr-auto'>";
    echo "<li class='nav-item active'>";
      echo "<a class='nav-link' href='#''>Home <span class='sr-only'>(current)</span></a>";
      echo "</li>";
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='#>Link</a>";
      echo "</li>";
      echo "<li class='nav-item'>";
      echo "<a class='nav-link disabled' href=''>Disabled</a>";
      echo "</li>";
    echo "</ul>";
    echo "<form class='form-inline my-2 my-lg-0'>";
      echo "<input class='form-control mr-sm-2' type='text' placeholder='Search' aria-label='Search'>";
      echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>";
    echo "</form>";
  echo "</div>";
echo "</nav>";










//Welcoming the user
   echo "<br><br><br><br><br>";
   echo "<div id='greeting'>";
   echo "<h1><center>Welcome, ".$record1['firstname']."</center></h1>";
   echo "<br><center><a href='viewprofile.php'><button type='button'>View Profile</button></a><br>";
   echo "Currently registered users:".$record2[0];
   echo "</div>";

   echo "<br><br>";
   echo "<br><br>";
//post
   echo "<div id='post'>";
   echo "<form action=''><input type='text' placeholder='Title' size='15' maxlength='20'><br><br>";
   echo "<textarea rows='5' cols='150' placeholder='What is in your mind?'></textarea>";
   echo "<br><br><button type='submit'>Post</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type='reset'>Reset</button></form>";
   echo "</div>";

   echo "</body></html>";
  }
else
 {
  echo "<center>You must login to continue<br><br><a href='../HTML/index.html'>Login Here</a></center>";
 }
mysqli_close($conn);
?>
