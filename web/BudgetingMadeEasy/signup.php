<?php
session_start();
?>
<!DOCTYPE html>
<html>
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
        </div>
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-xs-3"></div>
                
                <div class="col-xs-6">
                    <form class="form-horizontal" method="post" action="createUser.php">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Password:</label>
                                <div class="col-sm-10"> 
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="col-xs-3"></div>
                
            </div>
        </div>
    </body>
</html>