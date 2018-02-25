<?php
    require 'Model/CarController.php';
    $carController = new CarController();
    $carTables="";

    if (isset($_POST['brand']) && isset($_POST['type']) && isset($_POST['price'])) {
          $carTables="<h3>Selecting cars and displaying nearest result sorted on Price</h3><hr class='dhr'/>" ;
          $carTables = $carTables . $carController->CreateMixedTypes($_POST['brand'],$_POST['type'],$_POST['price']);
    }
    elseif(isset($_POST['type']))
    {
        //Fill page with type of car of the selected type
        $ptype=$_POST['type'];
        $carTables="<h3>Selecting cars of Type $ptype</h3><hr class='dhr'/>" ;
        $carTables = $carTables . $carController->CreateCarTypes($_POST['type']);
    }
    elseif (isset($_POST['price'])) {
        // Fill page with car price
        $carTables="<h3>Selecting cars of given Price and displaying nearest result sorted on Price</h3><hr class='dhr'/>" ;
        $carTables = $carTables . $carController->CreateCarPrice($_POST['price']);
    }
    else
    {
        //Page is loaded for the first time, no type selected -> Fetch all types
        //$coffeeTables = $coffeeController->CreateCoffeeTables('%');
        echo "Error select type";
    }

    //Output page data
    $title = 'Select Car';
    $content = $carTables;
    $excss="css\selectstyle.css";
    $jsfile="";

    include 'CarTemplate.php';
?>