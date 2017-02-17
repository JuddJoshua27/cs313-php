<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-xs-2">
                    <img style="width:100px; heigh:100px;" src="mvelopes-logo.jpg">
                </div>
                <div class="col-xs-10">
                    <h1>Budgeting Made Easy</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                </div>
                <div class="col-xs-2">
                    <p> Welcome
                    <?php
                        echo $_SESSION['login_user'];
                    ?>
                    </p>
                </div>
                <div class="col-xs-1">
                    <a href="logout.php">Log Out</a>
                </div>
            </div>
        </div>
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Budgeting Made Easy</a>
                </div>
                <ul class="nav navbar-nav">
                <li><a href="homepage.php">Home</a></li>
                <li class="active"><a href="#">My Budget</a></li>
                <li><a href="#">My Expenses</a></li>
                <li><a href="#">Overview</a></li>
                <li><a href="#">Reports per Category</a></li>
                </ul>
            </div>
        </nav>
    </body>
</html>