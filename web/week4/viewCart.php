<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <header style="background-color:black; border:10px green ridge; border-radius:15px">
            <br><br>
            <h1 style="color:white; text-align:center">Purchase your money here!</h1>
            <br><br>
        </header>
        <div>
            <p style="text-align: right;">
                Welcome 
                <?php 
                    if (!isset($_SESSION["user"])) {
                        header("Location: login.html");
                        exit();
                    }
                    
                    $username = $_SESSION["user"];
                    echo $username;
                ?>
            </p>
            <form action="logout.php" method="post">
                <input type="submit" value="Logout">                
            </form>
        </div>
        <div>
            <h4 style="text-align:center;">Your Cart Hold:</h4><br>
            <?php
                $products = $_SESSION["cart"];
                echo "<p style='text-align:center;'>"
                foreach($products as $product) {
                    echo "$product<br>";
                }
                echo "</p>"
            ?>
            
            
        </div>
        
        
    </body>
</html>