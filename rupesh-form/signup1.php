<html>
<head><title>create an account</title><link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css"  hredf="css/basic.css" />
</head>
<body>
  <?php
  include("includes/connect.php");

  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $uemail=$_POST['uemail'];
  $password=$_POST['password'];

  $mobileno=$_POST['mobileno'];
  $uaddress=$_POST['uaddress'];
  $ugender=$_POST['ugender'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $pincode=$_POST['pincode'];

print "welcome Mr/mrs. $firstname $lastname you have success logged in.";
$sql="insert into user1 (firstname , lastname , emailid , password , mobileno , address , gender , state , city , pincode)
       values ('$firstname' , '$lastname' , '$uemail' , '$password' , '$mobileno' , '$uaddress' , '$ugender' , '$state' , '$city' , '$pincode')" ;
       if (mysqli_query($connect, $sql)) {
           echo"<script>alert('Enter both username and password');</script>";
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }
echo"<script>alert('Enter both username and password');</script>";
  header('Location: success.php');
?>

</body>
</html>
