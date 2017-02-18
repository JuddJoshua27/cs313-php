<?php
require "dbcontrol.php"
$comm = get_db();

$statement = $comm->prepare("DELETE FROM player_inventory");
$statement->execute();
$statement = $comm->prepare("DELETE FROM player");
$statement->execute();
$statement = $comm->prepare("DELETE FROM login");
$statement->execute();

session_start();
session_destroy();
header('location: login.php');
?>