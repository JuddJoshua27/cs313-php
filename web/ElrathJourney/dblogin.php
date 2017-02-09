<?php
include "dbcontrol.php";

$comm = get_db();

echo "username<br>";

$username = htmlspecialchars($_POST['username']);

echo "the username is: $username <br>";

$statement = $comm->prepare("SELECT * FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	if ($row['user_name'] == $username)
    {
        session_start();

        $_SESSION["userID"] = $row['id'];
        
        header("Location: page1.php");
        die("Redirected to...");
    }
}

$statement = $comm->prepare("INSERT INTO login(user_name) VALUES ('$username')");
$statement->execute();

$statement = $comm->prepare("SELECT * FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	if ($row['user_name'] == $username)
    {
        session_start();

        $_SESSION["userID"] = $row['id'];
        
        header("Location: gamestart.php");
        die("Redirected to...");
    }
}
?>