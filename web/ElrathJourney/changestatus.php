<?php
require "dbcontrol.php";
$comm = get_db();

session_start();
    
    if ($_SESSION["player_status"] == "current")
    {
        $statement = $comm->prepare("UPDATE player SET status = 'inactive' WHERE id == '$_SESSION["playerID"]'");
        $statement->execute();
    }
$statement = $comm->prepare("SELECT * FROM player");
$statement->execute();

$rows = $statement->fetch(PDO::FETCH_ASSOC);

foreach ($rows as $row)
{
    echo $row["status"] . " : Health:" . $row["health"] . ", Magic:" . $row["magic"] . ", Attack:" . $row["attack"] . ", Defence:" . $row["defence"] . ", Gold:" . $row["gold"] . "<br>";
}

?>