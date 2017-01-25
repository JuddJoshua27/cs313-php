<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: login.html");
        exit();
    }
                    
    $username = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Home Page</title>
    </head>
    <body>
        <header style="background-color:black; border:10px green ridge; border-radius:15px">
            <br><br>
            <h1 style="color:white; text-align:center">Purchase your money here!</h1>
            <br><br>
        </header>
        <div>
            <form action="logout.php" method="post">
                <input type="submit" value="Logout">
            </form>
            <p style="text-align: center;">
                Welcome <?php echo $username; ?>
            </p><br><br>            
        </div>
        
        <form action="handleAdding.php" method="post">
            <input type="checkbox" name="buy[]" value="One" id="One">
            <label for="One">$ 1.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="Two" id="Two">
            <label for="Two">$ 2.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="Five" id="Five">
            <label for="Five">$ 5.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="Ten" id="Ten">
            <label for="Ten">$ 10.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="Twenty" id="Twenty">
            <label for="Twenty">$ 20.00 bill</label>
            <br><br>
            
            <input type="submit" value="Add to Cart">
            <input type="reset" value="Clear">
        </form>
    
    </body>

</html>