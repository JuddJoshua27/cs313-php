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
            <input type="checkbox" name="buy[]" value="one" id="one">
            <label for="one">$ 1.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="two" id="two">
            <label for="two">$ 2.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="five" id="five">
            <label for="five">$ 5.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="ten" id="ten">
            <label for="ten">$ 10.00 bill</label><br>
            <input type="checkbox" name="buy[]" value="twenty" id="twenty">
            <label for="twenty">$ 20.00 bill</label>
            <br><br>
            
            <input type="submit" value="Add to Cart">
            <input type="reset" value="Clear">
        </form>
    
    </body>

</html>