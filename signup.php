<?php
  include("includes/connect.php");

  $uname=$_POST['form-username'];
  $emailid=$_POST['form-email'];
  $password=$_POST['form-password'];
    if($uname!='' && $emailid!=''&& $password!='')
    {
        $encryptpass=password_hash($password,PASSWORD_DEFAULT);
        $euname=rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL,$password,$uname,MCRYPT_MODE_ECB)));
        $sql="insert into user1 values ('$euname','$emailid','$encryptpass')";
        if(mysqli_query($connect ,$sql)){
           header('Location:xyz.html');
         }
        else
            echo "error ". "<br>" . mysqli_error($connect);
    }
    else
    {
        echo"<script>alert('Enter both username and password');</script>";
    }
?>