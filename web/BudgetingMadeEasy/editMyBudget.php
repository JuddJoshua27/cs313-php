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
                <div class="col-xs-2"></div>
                <div class="col-xs-8">
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
                <li><a href="#">My Budget</a></li>
                <li><a href="#">My Expenses</a></li>
                <li><a href="#">Overview</a></li>
                <li><a href="#">Reports per Category</a></li>
                </ul>
            </div>
        </nav>
        <h1>My Budget</h1>
        
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-9"></div>
                <div class="col-xs-3">
                    <a href="myBudget.php"><button>Back</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                    <form action="createBudget.php" method="post">
                        <input type="submit" value="Create">
                        <input type="reset" value="Reset">
                        <table>
                            <tr>
                                <th>Category</th>
                                <th>Budget</th>
                            </tr>
                            <tr>
                                <td>Income</td>
                                <td>
                                    <input type="text" name="income" id="income" autofocus>
                                </td>
                            </tr>
                            <tr>
                                <td>Savings</td>
                                <td>
                                    <input type="text" name="savings" id="savings">
                                </td>
                            </tr>
                            <tr>
                                <td>Donations</td>
                                <td>
                                    <input type="text" name="donations" id="donations">
                                </td>
                            </tr>
                            <tr>
                                <td>Groceries</td>
                                <td>
                                    <input type="text" name="groceries" id="groceries">
                                </td>
                            </tr>
                            <tr>
                                <td>Rent / Mortgage</td>
                                <td>
                                    <input type="text" name="rent" id="rent">
                                </td>
                            </tr>
                            <tr>
                                <td>Utilities</td>
                                <td>
                                    <input type="text" name="utilities" id="utilities">
                                </td>
                            </tr>
                            <tr>
                                <td>Transportation</td>
                                <td>
                                    <input type="text" name="transport" id="transport">
                                </td>
                            </tr>
                            <tr>
                                <td>Auto Insurance</td>
                                <td>
                                    <input type="text" name="AInsurance" id="AInsurance">
                                </td>
                            </tr>
                            <tr>
                                <td>Medical</td>
                                <td>
                                    <input type="text" name="medical" id="medical">
                                </td>
                            </tr>
                            <tr>
                                <td>Medical Insurance</td>
                                <td>
                                    <input type="text" name="MInsurance" id="MInsurance">
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>
                                    <input type="text" name="phone" id="phone">
                                </td>
                            </tr>
                            <tr>
                                <td>Education</td>
                                <td>
                                    <input type="text" name="education" id="education">
                                </td>
                            </tr>
                            <tr>
                                <td>Other Expenses</td>
                                <td>
                                    <input type="text" name="other" id="other">
                                </td>
                            </tr>
                        </table>    
                    </form>
                </div>
                <div class="col-xs-3"></div>
            </div>
        </div>
    </body>
</html>