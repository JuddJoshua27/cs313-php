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
        <form class="centerAlign" action="dblogin.php" method="post">
            <label class="text">Please Log In</label><br>
            <label class="text">If returning please enter your username and password and click <span class="standout">Submit</span></label><br>
            <label class="text">If new, please enter your desired username and password and click <span class="standout">New Player</span> </label><br><br>
            <label class="text">Name: </label>
            <input type="text" name="username" id="username" placeholder="Elrath the Hobbit"><br>
            <label class="text">Name: </label>
            <input type="password" name="pword" id="pword">
        </form>    
    </body>
</html>