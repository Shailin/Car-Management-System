<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();
include("includes/connect.php");

 $uemail=$_POST['uemail'];
 $password=$_POST['password'];
 if($uemail!=''&&$password!='')
 {
     $sql="select firstname from user1 where emailid='$uemail' and password='$password'";
     $query=mysqli_query($connect ,$sql) or die(mysqli_error());
     $res=mysqli_fetch_row($query);

     if($res)
     {
        $_SESSION['uemail']=$_POST['uemail'];
        header('Location: Filter.php');
     }
     else
     {
     echo'You entered username or password is incorrect';
     }
   }
  else
   {
     echo"<script>alert('Enter both username and password');</script>";
   }

?>
<header id="header">
<h1>Unable to login
</h1></header>
 <br>
  <br>
   <br> <br>
  <marquee><h2><b>Please Login Correctly ----> Press RETRY</b></h2></marquee>
 <center><a href="signup1.html"><img src="reset.jpg" style="width:304px;height:228px;"></a></center>
 <footer id="footer">
<p>car Website www.VSR.com
</p></footer>
</body>
</html>
