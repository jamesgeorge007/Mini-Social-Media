<!DOCTYPE html>
<head>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
if($_SESSION['user']!='')
{
$conn=mysqli_connect("localhost","root","","login");
$select="SELECT * FROM credentials WHERE username='".$_SESSION['user']."'";
$query=mysqli_query($conn,$select);
echo "<div class='container-fluid'><center><BR><BR><H1><U>Your Profile</U></H1><BR><BR><A href='profile.php'><BUTTON type='button'>Go Back</BUTTON></A><BR><BR><TABLE border cellpadding='32' cellspacing='16' bordercolor=maroon>";
while($record=mysqli_fetch_array($query))
  {
echo "<TR bgcolor='yellow'><TH><FONT face='elephant' size='36'>Name</FONT></TH><TD><FONT face='forte' size='26'>".$record['fullname']."</FONT></TD></TR>";
echo "<TR bgcolor='brown'><TH><FONT face='elephant' size='36'>Username</FONT></TH><TD><FONT face='forte' size='26'>".$record['username']."</FONT></TD></TR>";
echo "<TR bgcolor='limegreen'><TH><FONT face='elephant' size='36'>E-mail</FONT></TH><TD><FONT face='forte' size='26'>".$record['email']."</FONT></TD></TR>";
}

echo "</TABLE>";
echo "<br><a href='../HTML/update.html'><button type='button'>Edit Profile</button></a><br><br><br>";
echo "<a href='../HTML/change_password.html'><button type='button'>Change Password</button></a></center></div";
}
else
{
 header('location:profile.php');
}
mysqli_close($conn);
 ?>
 </body>
 </html>
