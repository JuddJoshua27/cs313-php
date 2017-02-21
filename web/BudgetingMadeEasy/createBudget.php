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
$education = $_POST["education"];
$other = $_POST["other"];

$statement = $comm->prepare("INSERT INTO budget(church_donations, groceries, rent_mortgage, utilities, transportation, auto_insurance, medical_insurance, phone, education, medical, other_expenses, savings, income) VALUES($donations, $groceries, $rent, $utilities, $transport, $AutoIns, $MedIns, $phone, $educations, $medical, $other, $savings, $income)");
$statement->execute();

echo "Inserted Correctly! check the DB.";

?>