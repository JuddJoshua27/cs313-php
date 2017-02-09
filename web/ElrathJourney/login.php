<?php

    include "dbcontrol.php";

    $conn = get_db();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Elrath's Journey Homepage</title>
        <link rel="stylesheet" type="text/css"  href="elrath.css">
        <style>
            body
            {
                background-image: url(pics/REALFinalBackground.jpg);
                background-repeat: no-repeat;
                background-size: 100%;
            }
        
        </style>
    </head>
    <body>
        <br><br><br><br><br><br><br><br><br><br>
        <p class="text">
            Please Log In<br>
            If returning please enter your username and password and click <span class="standout">Submit</span><br>
            If new, please enter your desired username and password and click <span class="standout">New Player</span> 
        </p><br><br><br><br><br><br><br><br>
        <form class="centerAlign" action="dblogin.php" method="post">
            <label class="text">Name: </label>
            <input type="text" name="username" id="username" placeholder="Elrath the Hobbit"><br><br>
            <label class="text">Password: </label>
            <input type="password" name="pword" id="pword"><br><br>
            <input type="submit" name="submit" id="submit" value="New Player">
            <input type="submit" name="submit" id="submit" value="submit">
        </form>    
    </body>
</html>