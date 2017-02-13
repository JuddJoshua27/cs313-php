<?php
require "dbcontrol.php";

$comm = get_db();

// Get the username from the form
$username = htmlspecialchars($_POST['username']);

// query the db for everything in login
$statement = $comm->prepare("SELECT * FROM login");
$statement->execute();

// check if the username is already in use. if so redirect the player to the correct page they saved on. 
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	if ($row['user_name'] == $username)
    {
        session_start();

        $_SESSION["userID"] = $row['id'];
        
        
        switch ($row["page_number"])
        {
            case 1:
                header("Location: pages/page1.php");
                die("Redirected to...");
                break;
            default:
                echo "This is awkward!";
        }
            
    }
}

// if the username is not found in the db, create a new one and insert into the db.
$statement = $comm->prepare("INSERT INTO login(user_name, page_number) VALUES ('$username', 1)");
$statement->execute();

// now double check of the username is in the db
$statement = $comm->prepare("SELECT * FROM login");
$statement->execute();

// redirect them to create their character.
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