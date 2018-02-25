<script >
   function render(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="ok()">OK</button>';
    }
     function ok(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
</script>

<?php
    require 'Usedcars\UCarController.php';
    $carController = new UCarController();

    $title ="Add a new Car";
    $excss="css/Addstyle.css";
    $jsfile="";

    // so that we do not have to resubmit form on back and forth nav
   header('Cache-Control: no cache'); //no cache
   session_cache_limiter('private_no_expire'); // works

   if (isset($_SESSION)) {
   }else{
        session_start();
   }

   if (isset($_SESSION['uemail'])){}
   else{

      echo '<div id="dialogoverlay"></div>
              <div id="dialogbox">
                <div>
                  <div id="dialogboxhead"></div>
                  <div id="dialogboxbody"></div>
                  <div id="dialogboxfoot"></div>
                </div>
              </div>
            <div style:clear=both;></div>';
      echo' <script>render("Please login to our website.");</script>';
   }


if(isset($_GET["update"]))
{
    $car = $carController->GetCarById($_GET["update"]);

    $content ="<form action='' method='post' >
    <fieldset  style='width: 1000px; margin: 0 auto;background-color: #eaeaea;'>
        <legend>Update your Car</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' value='". $car->name ."' required /><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' value='$car->price'/><br/>

        <label for='description'>description: </label>
        <textarea cols='70' rows='12' name='txtdesc'>$car->descp</textarea></br>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddltype'>
            <option value='%'>All</option>"
        .$carController->CreateOptionValues($carController->GetCarTypes()).
        "</select><br/>

        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$carController->GetImages().
        "</select></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";
}
 else
{
    $content ="<form action='' method='post'>
    <fieldset  style='width: 1000px; margin: 0 auto;background-color: #eaeaea;' >
        <legend>Add a new Car</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' required /><br/><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' required/><br/><br/>

        <label for='description'>description: </label>
        <textarea cols='70' rows='12' name='txtdesc'  required></textarea></br><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddltype' required>
            <option value='%'>All</option>"
        .$carController->CreateOptionValues($carController->GetCarTypes()).
        "</select><br/><br/>

        <label for='image' >Image: </label>
        <select class='inputField' name='ddlImage' required>"
        .$carController->GetImages().
        "</select></br><br/>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";
}

$content.='<div id="dialogoverlay"></div>
              <div id="dialogbox">
                <div>
                  <div id="dialogboxhead"></div>
                  <div id="dialogboxbody"></div>
                  <div id="dialogboxfoot"></div>
                </div>
              </div>';

if(isset($_GET["update"]))
{
    if(isset($_POST["txtName"]) && isset($_POST["txtPrice"]) && isset($_POST["txtdesc"]))
    {
        if(isset($_SESSION['uemail'])){
          $carController->UpdateCar($_GET["update"]);
          echo"<script>alert('Successful updated data to our website');</script>";
          header('Refresh:0; url=CarOverview.php');
       }
       else
        echo"<script>render('Please login to our website.');</script>";
    }
}
else
{
    if(isset($_POST["txtName"]) && isset($_POST["txtPrice"]) && isset($_POST["txtdesc"]))
    {
      if(isset($_SESSION['uemail'])){
        $carController->InsertCar();
        echo"<script>alert('Successful Inserted data to our website');</script>";
        header('Refresh:0; url=CarOverview.php');
      }
      else
      {
         echo"<script>render('Please login to our website.');</script>";
      }
    }
}

include 'CarTemplate.php';
?>


