<?php
session_start();
if($_SESSION['user']!='')
{
$conn=mysqli_connect("localhost","root","","login");
$select="SELECT * FROM credentials WHERE username='".$_SESSION['user']."'";
$query=mysqli_query($conn,$select);
while($record=mysqli_fetch_array($query))
  {
echo "<BODY><CENTER><BR><BR><H1><U>Your Profile</U></H1><BR><BR><A href='profile.php'><BUTTON type='button'>Go Back</BUTTON></A><BR><BR><TABLE border cellpadding='32' cellspacing='16' bordercolor=maroon>";
echo "<TR bgcolor='brown'><TH><FONT face='elephant' size='36'>Username</FONT></TH><TD><FONT face='forte' size='26'>".$record['username']."</FONT></TD></TR>";
echo "<TR bgcolor='orange'><TH><FONT face='elephant' size='36'>Firstname</FONT></TH><TD><FONT face='forte' size='26'>".$record['firstname']."</FONT></TD></TR>";
echo "<TR bgcolor='skyblue'><TH><FONT face='elephant' size='36'>Lastname</FONT></TH><TD><FONT face='forte' size='26'>".$record['lastname']."</FONT></TD></TR>";
echo "<TR bgcolor='limegreen'><TH><FONT face='elephant' size='36'>E-mail</FONT></TH><TD><FONT face='forte' size='26'>".$record['email']."</FONT></TD></TR>";
echo "</TABLE></BODY>";
echo "<br><a href='../HTML/update.html'><button type='button'>Edit Profile</button></a><br><br><br>";
echo "<a href='../HTML/change_password.html'><button type='button'>Change Password</button></a></center>";
  }
mysqli_close($conn);
}
else
{
 header('location:profile.php');
}
 ?>
