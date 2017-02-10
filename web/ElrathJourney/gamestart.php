<?php
require "dbcontrol.php";
$comm = get_db();

session_start();
$userID = $_SESSION["userID"];

$statement = $comm->prepare("INSERT INTO player(login_id, health, magic, attack, defence, gold) VALUES ($userID, 200, 100, 50, 50, 397)");
$statement->execute();

$last_id = $comm->lastInsertId();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 1)");
$statement->execute();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 2)");
$statement->execute();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 3)");
$statement->execute();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 4)");
$statement->execute();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 5)");
$statement->execute();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 6)");
$statement->execute();

$statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($last_id, 7)");
$statement->execute();

header("Location: page1.php");
die("Redirected to...");

?> 