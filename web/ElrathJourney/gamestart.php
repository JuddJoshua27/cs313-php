<?php
include "dbcontrol.php";
$comm = get_db();
session_start();
    if (!isset($_SESSION["userID"])) {
        header("Location: login.html");
        exit();
    }

// Create a player
$statement = $comm->prepare("INSERT INTO player(health, magic, attack, defence, gold, status) VALUES (500, 200, 100, 100, 356, 'current')");
$statement->execute();
/*
$statement = $comm->prepare("SELECT * FROM player");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo $row["status"] . " : " . $row["health"] . ", " . $row["magic"] . ", " . $row["attack"] . ", <br>          " . $row["defence"] . ", " . $row["gold"] . "<br>"
}

*/






?>