<?php
include "dbcontrol.php";

$comm = get_db();

echo "username and password<br>";

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['pword']);

echo "the username is: $username <br>";
echo "the password is: $password";

$statement = $comm->prepare("SELECT user_name, password FROM login");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	if ($row['user_name'] == $username)
    {
        if ($row['password'] == $password)
        {
            header("Location: gamestart.php");
            die("Redirected to...");
        }
        else
        {
            header("Location: login.html");
            die("Redirected to...");
        }
    }
}

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
?>