<?php
require "dbcontrol.php";
$comm = get_db();

session_start();
$userID = $_SESSION["userID"];

$statement = $comm->prepare("INSERT INTO player(login_id, health, magic, attack, defence, gold) VALUES ($userID, 200, 100, 50, 50, 397)");
$statement->execute();

echo "Player created!";

?> 