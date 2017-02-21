<?php
require "dbcontrol.php";
$comm = get_db();

session_start();

$user_id = $_SESSION["login_id"];
$income = null;
$savings = null;
$donations = null;
$groceries = null;
$rent = null;
$utilities = null;
$transport = null;
$AutoIns = null;
$medical = null;
$MedIns = null;
$phone = null;
$educations = null;
$other = null;

$statement = $comm->prepare("SELECT * FROM budget b INNER JOIN budgetLogin bl ON b.id = bl.budget_id WHERE bl.id = $user_id");
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// loop through and get the password of the user
foreach ($rows as $row) {
    $income = row["income"];
    $savings = row["savings"];
    $donations = row["church_donations"];
    $groceries = row["groceries"];
    $rent = row["rent_mortgage"];
    $utilities = row["utilities"];
    $transport = row["transportation"];
    $AutoIns = row["auto_insurance"];
    $medical = row["medical"];
    $MedIns = row["medical_insurance"];
    $phone = row["phone"];
    $educations = row["education"];
    $other = row["other_expenses"];
}


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
                <li class="active"><a href="#">My Budget</a></li>
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
                    <a href="editMyBudget.html"><button>Edit</button></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                    <table>
                        <tr>
                            <th>Category</th>
                            <th>Budget</th>
                        </tr>
                        <tr>
                            <td>Income</td>
                            <td>
                                <?php echo $income?>
                            </td>
                        </tr>
                        <tr>
                            <td>Savings</td>
                            <td>
                                <?php echo $savings?>
                            </td>
                        </tr>
                        <tr>
                            <td>Donations</td>
                            <td>
                                <?php echo $donations?>
                            </td>
                        </tr>
                        <tr>
                            <td>Groceries</td>
                            <td>
                                <?php echo $groceries?>
                            </td>
                        </tr>
                        <tr>
                            <td>Rent / Mortgage</td>
                            <td>
                                <?php echo $rent?>
                            </td>
                        </tr>
                        <tr>
                            <td>Utilities</td>
                            <td>
                                <?php echo $utilities?>
                            </td>
                        </tr>
                        <tr>
                            <td>Transportation</td>
                            <td>
                                <?php echo $transport?>
                            </td>
                        </tr>
                        <tr>
                            <td>Auto Insurance</td>
                            <td>
                                <?php echo $AutoIns?>
                            </td>
                        </tr>
                        <tr>
                            <td>Medical</td>
                            <td>
                                <?php echo $medical?>
                            </td>
                        </tr>
                        <tr>
                            <td>Medical Insurance</td>
                            <td>
                                <?php echo $MedIns?>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <?php echo $phone?>
                            </td>
                        </tr>
                        <tr>
                            <td>Education</td>
                            <td>
                                <?php echo $education?>
                            </td>
                        </tr>
                        <tr>
                            <td>Other Expenses</td>
                            <td>
                                <?php echo $other?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-3"></div>
            </div>
        </div>
    </body>
</html>