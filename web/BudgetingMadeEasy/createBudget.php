<?php
require "dbcontrol.php"
$comm = get_db();

session_start();



$income = $_POST["income"];
$savings = $_POST["savings"];
$donations = $_POST["donations"];
$groceries = $_POST["groceries"];
$rent = $_POST["rent"];
$utilities = $_POST["utilities"];
$transport = $_POST["transport"];
$AutoIns = $_POST["AInsurance"];
$medical = $_POST["medical"];
$MedIns = $_POST["MInsurance"];
$phone = $_POST["phone"];
$educations = $_POST["education"];
$other = $_POST["other"];

?>