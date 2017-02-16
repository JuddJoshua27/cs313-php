<?php
require "dbcontrol.php";
$comm = get_db();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Elrath's Journey Homepage</title>
        <link rel="stylesheet" type="text/css"  href="elrath.css">
        <style>
            body
            {
                background-image: url(pics/Hallway.jpg);
                background-repeat:no-repeat;
                background-position:50% 25%;
                background-color: black;
            }
            h3
            {
                color:white;
                background-color: brown;
                text-align: center;
                border-bottom: 4px solid;
                border-bottom-color: darkgrey;
                border-bottom-left-radius: 100px;
                border-top: 1.5px solid;
                border-top-color: darkgrey;
                border-top-right-radius: 100px;
                padding-left: 20px;
                padding-right: 20px;
                margin-right:76%;
            }
            .anotherh3
            {
                color:white;
                background-color: brown;
                text-align: center;
                border-bottom: 4px solid;
                border-bottom-color: darkgrey;
                border-bottom-left-radius: 100px;
                border-top: 1.5px solid;
                border-top-color: darkgrey;
                border-top-right-radius: 100px;
                padding-left: 20px;
                padding-right: 20px;
                margin-left:76%;
                display: inline-block;
            }
            table
            {
                color: white;
                background-color: brown;
                text-align: center;
                border-bottom: 4px solid;
                border-bottom-color: darkgrey;
                border-top: 1.5px solid;
                border-top-color: darkgrey;
                margin-right:76%;
            }
            tr, th
            {
                border-bottom: 4px solid;
                border-bottom-color: darkgrey;
                border-top: 1.5px solid;
                border-top-color: darkgrey;
            }
            td
            {
                border-bottom: 1.5px solid;
                border-bottom-color: darkgrey;
                border-top: 1.5px solid;
                border-top-color: darkgrey;
                border-left: 4px solid;
                border-left: darkgrey;
                border-right: 1.5px solid;
                border-right-color: darkgrey;
            }
            a
            {
                display:inline-block;
                
            }
        </style>
    </head>
    <body>
       <?php
        session_start();
        $userID = $_SESSION["userID"];
        
        $statement = $comm->prepare("SELECT * FROM login WHERE id = $userID");
        $statement->execute();
        $user_name = null;
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $user_name = $row["user_name"];
        }
        $statement = $comm->prepare("SELECT * FROM player WHERE login_id = $userID");
        $statement->execute();
        
        $player_id= null;
        $health = null;
        $magic = null;
        $attack = null;
        $defence = null;
        $gold = null;
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $player_id = $row["id"];
            $health = $row["health"];
            $magic = $row["magic"];
            $attack = $row["attack"];
            $defence = $row["defence"];
            $gold = $row["gold"];
        }
        
        $statement = $comm->prepare("SELECT * FROM inventory i INNER JOIN player_inventory pi ON i.id = pi.inventory_id WHERE pi.player_id = $player_id; ");
        $statement->execute();
        
        $item_name = null;
        $description = null;
        $health_manip = null;
        $magic_manip = null;
        $attack_manip = null;
        $defence_manip = null;
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $health_manip += $row["health_manip"];
            $magic_manip += $row["magic_manip"];
            $attack_manip += $row["attack_manip"];
            $defence_manip += $row["defence_manip"];
        }
        
        $total_health = $health + $health_manip;
        $total_magic = $magic + $magic_manip;
        $total_attack = $attack + $attack_manip;
        $total_defence = $defence + $defence_manip;
            
        
        echo "<h3>" . $user_name . "<br>" . 
            "HP: " . $total_health . "  |  MP: " . $total_magic . "<br>" .
            "Attack: " . $total_attack . " |  Defence: " . $total_defence .  "<br>" .
            "Gold: " . $gold . "</h3>";
        ?>
        <!---
        <h3 class="anotherh3">this is just filler text to see if this will actually work. i am hoping that it will work so that i dont have to fanagle something to work. its really anoying when things dont work the first time, although, that is rare as a programmer to have code work the first time. really annoying. i misspelled annoying wrong earlier in this paragraph, can you tell me where?</h3>-->
        <table>
            <tr>
                <th>Item Name</th>
                <th>Item Description</th>
            </tr>        
        <?php
        $statement = $comm->prepare("SELECT * FROM inventory i INNER JOIN player_inventory pi ON i.id = pi.inventory_id WHERE pi.player_id = $player_id;");
        $statement->execute();
            
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>" . "<td>" . $row["item_name"] . "</td>" . "<td>" . $row["description"] . "</td>" . "</tr>";
        }
        ?>
        </table>
        
        
        <a href="">
            <h4>test 1</h4>
        </a>
        
        <a href="">
            <h4>test 2</h4>
        </a>
        
        <a href="">
            <h4>test 3</h4>
        </a>
        
    </body>
</html>