<?php
include "dbcontrol.php";

$comm = get_db();

echo "username and password<br>";

$username = htmlspecialchars($_POST['username']);

echo "the username is: $username <br>";

$statement = $comm->prepare("SELECT user_name FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	if ($row['user_name'] == $username)
    {
        header("Location: gamestart.php");
        die("Redirected to...");
    }
}

$statement = $comm->prepare("INSERT INTO login(user_name) VALUES ('$username'");
$statement->execute();

$statement = $comm->prepare("SELECT user_name FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	echo '<p>';
	echo $row['user_name'];
	echo '</p>';
}
/*
header("Location: gamestart.php");
die("Redirected to...");
*/
?>