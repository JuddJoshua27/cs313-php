<?php
include "dbcontrol.php";

$comm = get_db();

echo "username and password<br>";

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['pword']);

echo "the username is: $username <br>";
echo "the password is: $password";

$statement = $comm->prepare("INSERT INTO login(user_name, password) VALUES ('$username', '$password')");
$statement->execute();

$statement = $comm->prepare("SELECT user_name, password FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	echo '<p>';
	echo $row['user_name'] . ' - ' . $row['password'];
	echo '</p>';
}

$statement = $comm->prepare("DELETE FROM login");
$statement->execute();

$statement = $comm->prepare("SELECT user_name, password FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	echo '<p>';
	echo $row['user_name'] . ' - ' . $row['password'];
	echo '</p>';
}

echo "things deleted";
?>