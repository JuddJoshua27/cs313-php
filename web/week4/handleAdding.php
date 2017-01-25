<?php 
    session_start();
    
    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    
    $products = $_POST["buy"];

    foreach($products as $product) {
        array_push($_SESSION["cart"], $product);
    }

    header("Location: viewCart.php");
    die("Redirected to...");
?>