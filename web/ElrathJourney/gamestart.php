<?php
require "dbcontrol.php";
$comm = get_db();

session_start();
$userID = $_SESSION["userID"];

echo $userID;

?>