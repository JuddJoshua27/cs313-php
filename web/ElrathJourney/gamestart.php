<?php
require "dbcontrol.php";
$comm = get_db();
session_start();
    if (!isset($_SESSION["userID"])) {
        header("Location: login.html");
        exit();
    }

// Create a player
$statement = $comm->prepare("INSERT INTO player(health, magic, attack, defence, gold, status) VALUES (500, 200, 100, 100, 356, 'current')");
$statement->execute();
echo "working?<br>";

$statement = $comm->prepare("SELECT * FROM player");
$statement->execute();
echo "queried<br>";

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo $row["status"] . " : Health:" . $row["health"] . ", Magic:" . $row["magic"] . ", Attack:" . $row["attack"] . ", Defence:" . $row["defence"] . ", Gold:" . $row["gold"] . "<br>";
    
    if ($row["status"] == 'current')
    {
        $_SESSION["playerID"] = $row["id"];
    }
}
echo $_SESSION["playerID"];






?>