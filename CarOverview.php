<?php
$title = "Manage car objects";
$excss="css\selectstyle.css";
$jsfile="";

include 'Usedcars\UCarController.php';
$carController = new UCarController();

$content = $carController->CreateOverviewTable();

include 'CarTemplate.php';
?>
