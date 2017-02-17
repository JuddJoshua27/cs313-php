<?php
session_start();

require "dbcontrol.php";
$comm = get_db();

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$hash = password_hash($password, PASSWORD_DEFAULT);

try{
    $sql = "INSERT INTO budgetLogin(username, password) VALUES(:username, :password)";
    
    $statement = $comm->prepare($sql);
    
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    
    $statement->execute();
}
catch(PDOException $ex) {
    echo "Error connecting to Database. Details: $ex";
}

header("location: index.php");
die();
?>