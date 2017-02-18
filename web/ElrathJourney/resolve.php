<?php
require "dbcontrol.php"
$comm = get_db();
/*
$statement = $comm->prepare("SELECT * FROM player WHERE login_id = $userID");
        $statement->execute();
        
        $player_id= null;
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $player_id = $row["id"];
        }

session_start();
$user_id = $_SESSION("userID");
*/
$player_id = 22;
$statement = $comm->prepare("DELETE FROM player_inventory WHERE player_id = $player_id");
$statement->execute();
$statement = $comm->prepare("DELETE FROM player WHERE id = $player_id");
$statement->execute();
$statement = $comm->prepare("DELETE FROM login WHERE id = $user_id");
$statement->execute();


session_destroy();
header('location: login.php');
?>