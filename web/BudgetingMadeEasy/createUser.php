<?php
session_start();

require "dbcontrol.php";
$comm = get_db();

$username = $_POST["username"];

$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

try{
    $sql = "INSERT INTO budgetLogin(username, password) VALUES(:username, :password)";
    
    $statement = $comm->prepare($sql);
    
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    
    $statement->execute();
    
    $id = $db->lastInsertId();
    $_SESSION["user_id"] = $id;
}
catch(PDOException $ex) {
    echo "Error connecting to Database. Details: $ex";
}
?>