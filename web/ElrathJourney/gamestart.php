<?php
require "dbcontrol.php";
$comm = get_db();
session_start();
    if (!isset($_SESSION["userID"])) {
        header("Location: login.html");
        exit();
    }

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



?>