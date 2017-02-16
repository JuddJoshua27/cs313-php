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
                margin:auto;
            }
            h4
            {
                background-color:black;
                color:white;
                border-bottom-left-radius: 30px;
                border-top-right-radius: 30px;
                border-color:white;
                border-style: double;
                padding:10px 30px 10px 30px;
                margin-left: auto;
                margin-right:auto;
                cursor:pointer;
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
            .center
            {
                margin-left: auto;
                margin-right: auto;
                display:block;
            }
        </style>
    </head>
    <body>
        
        <h3 class="anotherh3">As you open the chest, the brilliancy of the treasure takes your breath away for a moment. Nestled at the bottom of the chest are the most beautiful pants you have ever seen. The brightest of white dawns your eyes as you lift these Divine Pants off of the wood. As you slip into them, you feel energized. It is as if Heaven itself is giving you the strength to fight the evil buried within these halls. Replacing your Steel Leggings over your new pants, you turn and go back to the split in the hall and reorient yourself as you came upon the intersection so you do not get lost or confused. The other two choices are yours to take.</h3>
        <div class="center">
            <a href="">
                <h4>Go strait</h4>
            </a>
        
            <a href="">
                <h4>Go to the right</h4>
            </a>
        </div>
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
        <table>
            <tr>
                <th>Item Name</th>
                <th>Item Description</th>
            </tr>        
        <?php
        $statement = $comm->prepare("INSERT INTO player_inventory(player_id, inventory_id) VALUES($player_id, 8)");
        $statement->execute();
            
        $statement = $comm->prepare("SELECT * FROM inventory i INNER JOIN player_inventory pi ON i.id = pi.inventory_id WHERE pi.player_id = $player_id;");
        $statement->execute();
            
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>" . "<td>" . $row["item_name"] . "</td>" . "<td>" . $row["description"] . "</td>" . "</tr>";
        }
        ?>
        </table>        
    </body>
</html>