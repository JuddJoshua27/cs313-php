<?php
    $username = htmlspecialchars($_POST["username"]);

    session_start();

    $_SESSION["user"] = $username;

    header("Location: shop.php");
?>