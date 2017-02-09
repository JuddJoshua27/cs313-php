<?php
include "dbcontrol.php";
$comm = get_db();
session_start();
    if (!isset($_SESSION["userID"])) {
        header("Location: login.html");
        exit();
    }

// Create a player
$statement = $comm->prepare("INSERT INTO player(health, magic, attack, defence, gold) VALUES(20, 10, 1, 0, 0)");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
        $_SESSION["playerID"] = $row['id'];    
}

// Create a game_instance
$statement = $comm->prepare("INSERT INTO game_instance(login_id, page_id, player_id) VALUES('$_SESSION["userID"]', 1, '$_SESSION["playerID"]')");
$statement->execute();






?>