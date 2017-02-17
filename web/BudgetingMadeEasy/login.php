<?php
session_start();

if (!isset($_POST['login']) || strlen(trim($_POST['login'])) == 0 || !isset($_POST['password'])) {
    header('location: index.php');
    exit();
}

require "dbcontrol.php";
$comm = get_db();

$username = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);


$statement = $comm->prepare('SELECT * FROM budgetLogin WHERE username = :username');
$statement->bindValue(':username', $username, PDO::PARAM_STR);
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// loop through and get the password of the user
foreach ($rows as $row) {
    $hash = $row['password'];
}

echo $hash;

// verify the password
if (password_verify($password, $hash)) 
{
    /*
    $_SESSION["login_user"] = $username;
    header('location: homepage.php');
    die();*/
}
else {
    header('location:index.php');
    die();
}
?>