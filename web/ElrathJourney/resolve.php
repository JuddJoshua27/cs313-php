<?php
require "dbcontrol.php";
$comm = get_db();
session_start();

$userID = $_SESSION["userID"];
$playerID = $_SESSION["playerID"];

$statement = $comm->prepare("DELETE FROM player_inventory WHERE player_id = $playerID");
$statement->execute();
$statement = $comm->prepare("DELETE FROM player WHERE id = $playerID");
$statement->execute();
$statement = $comm->prepare("DELETE FROM login WHERE id = $userID");
$statement->execute();

session_destroy();
header('location: login.html');
?>