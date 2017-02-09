<?php
require "dbcontrol.php";
$comm = get_db();
session_start();
if (!isset($_SESSION["userID"])) 
{
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION["userID"];

// Create a player
$statement = $comm->prepare("INSERT INTO player(health, magic, attack, defence, gold) VALUES (500, 200, 100, 100, 356)");
$statement->execute();
echo "working?<br>";

$statement = $comm->prepare("SELECT * FROM player");
$statement->execute();
echo "queried<br>";

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo $row["id"] . " : Health:" . $row["health"] . ", Magic:" . $row["magic"] . ", Attack:" . $row["attack"] . ", Defence:" . $row["defence"] . ", Gold:" . $row["gold"] . "<br>";
    
}

$newid = $comm->lastInsertId();

echo $newid;
echo $user_id;

$statement = $comm->prepare("INSERT INTO game_instance(login_id, page_id, player_id) VALUES ($user_id, 1, $newid)");
$statement->execute();

echo "gameinstance inserted into";

?>