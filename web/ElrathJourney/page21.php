<?php
require "dbcontrol.php";
$comm = get_db();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Elrath's Journey Homepage</title>
        <link rel="stylesheet" type="text/css"  href="elrath.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body
            {
                background-image: url(pics/HallwayWithSkeleton.jpg);
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
                padding-left: 40px;
                padding-right: 40px;
            }
            p
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
        
        $_SESSION["playerID"] = $player_id;
        
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
        ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3">
                    <?php
                    echo "<h3>" . $user_name . "<br>" . 
                        "HP: " . $total_health . "  |  MP: " . $total_magic . "<br>" .
                        "Attack: " . $total_attack . " |  Defence: " . $total_defence .  "<br>" .
                        "Gold: " . $gold . "</h3>";
                    ?>
                </div>
            <div class="col-xs-6"></div>
                <div class="col-xs-3">
                    <br>
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
                </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-5"></div>
                <div class="col-xs-2">
<!---------------------------------------------------------------Choice 1------------->
                    <a href="page1.php">
                        <p>Go back to the Four-Way Intersection</p>
                    </a>
                </div>
               
                <div class="col-xs-5"></div>
            </div>
        </div>
        <h3>Despite the painful scrape on your stomach you take a well-aimed shot at the skeletons body. As you hit its body it crumples into a useless pile of Bones. You have defeated it. </h3>
        
        
    </body>
</html>