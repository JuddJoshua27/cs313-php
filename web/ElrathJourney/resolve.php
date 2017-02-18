<?php
require "dbcontrol.php"
$comm = get_db();

session_start();
$player_id = $_SESSION("player-id");
$user_id = $_SESSION("userID");
$statement = $comm->prepare("DELETE FROM player_inventory WHERE player_id = $player_id");
$statement->execute();
$statement = $comm->prepare("DELETE FROM player WHERE id = $player_id");
$statement->execute();
$statement = $comm->prepare("DELETE FROM login WHERE id = $user_id");
$statement->execute();


session_destroy();
header('location: login.php');
?>