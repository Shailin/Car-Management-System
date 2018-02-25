<!DOCTYPE html>
<html>
 <head>
    <title><?php echo $title; ?></title>

     <link rel="icon"
          href="images/vsr-top-logo.png"
          type="image/x-icon" />

     <link rel="stylesheet" type="text/css"
          href="css/float_aside.css" />

     <link rel="stylesheet" type="text/css"
          href=<?php  echo $excss; ?>  />

      <script src=<?php echo $jsfile ?> ></script>
 </head>

     <?php

       // so that we do not have to resubmit form on back and forth nav
       header('Cache-Control: no cache'); //no cache
       session_cache_limiter('private_no_expire'); // works
       //session_cache_limiter('public'); // works too

       // Inialize session
       if (isset($_SESSION)) {}
       else{
           session_start();
       }

       $value1="Signup/Login";
       $slogout="xyz.html";

      //Initialize variables not initialized without overwriting previously set variables.
      if (isset($_SESSION['uemail'])) {
          $value1=$_SESSION['uemail'];
          $slogout="logout.php";
       }
    ?>


 <body>
     <header>
      <div class="header">
          <a  class="top-logo" href="">
              VSR CARS.COM
          </a>
        <div class="float-right  wide-text">
            THE BEST CAR WEBSITE
        </div>
     </div>

      <div class="topnav" style="position:relative;top:0px;">
        <div class="modelnavspace">
          <div>
              <a href="Filter.php">NEW CARS</a>
              <a href="Management.php">SELL CAR</a>
              <a href="vintage.html">VINTAGE CARS</a>
              <a href="home.html"> >>Home </a>

              <?php
                if (!isset($_SESSION['uemail']))
                {
                   echo "<a href= $slogout class='floatrht'> $value1 </a>";
                }
               else{
                echo "<div class='dropdown'>
                   <button class='dropbtn'> $value1 </button>
                     <div class='dropdown-content'>
                       <a href='UserOverview.php'>User Account</a>
                       <a href='$slogout' >Logout</a>
                     </div>
                </div>";
              }

              ?>
          </div>
        </div>

     </div>
   </header>

    <div class="main_content">
       <div id="content_area">
            <?php echo $content; ?>
       </div>
       <div id="sidebar">
       </div>
    </div>
    <script src="js\jQuery.js"></script>
 </body>
</html>

