<?php
$title = "Manage car objects";
$excss="css\selectstyle.css";
$jsfile="";

include 'Usedcars\UCarController.php';
$carController = new UCarController();

$content = $carController->CustomerTable();

if(isset($_GET["delete"]))
{
    $carController->DeleteCar($_GET["delete"]);
}

include 'CarTemplate.php';
?>
