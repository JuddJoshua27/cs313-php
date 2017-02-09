<?php
require "dbcontrol.php";
$comm = get_db();

session_start();
$playerID = $_SESSION["playerID"];
$player_status = $_SESSION["player_session"];

echo $player_status;
    
if ($player_status == "current")
{
    $statement = $comm->prepare("UPDATE player SET status = 'inactive'");
    $statement->execute();
}

$statement = $comm->prepare("SELECT * FROM player");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo $row["status"] . " : Health:" . $row["health"] . ", Magic:" . $row["magic"] . ", Attack:" . $row["attack"] . ", Defence:" . $row["defence"] . ", Gold:" . $row["gold"] . "<br>";
}

?>