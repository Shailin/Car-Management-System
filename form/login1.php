<?php
  session_start();
  include("../includes/connect.php");

  $emailid=$_POST['form-email'];
  $password=$_POST['form-password'];
    if( $emailid!=''&& $password!='')
    {
        $sql="SELECT * FROM user1 WHERE emailid='$emailid'";
        $res=mysqli_query($connect ,$sql);
        $row=mysqli_fetch_array($res);
        $hash_pwd=$row['password'];
        if(!$hash=password_verify($password,$hash_pwd)){
          echo password_hash($password,PASSWORD_DEFAULT);
          echo "error";
        }
        else{
           $_SESSION['uemail']=$_POST['form-email'];
           header('Location: ../Filter.php');
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
     <center><a href="../xyz.html"><img src="../assets/img/reset.jpg" style="width:304px;height:228px;"></a></center>
   <footer id="footer">

    </footer>
</body>
</html>