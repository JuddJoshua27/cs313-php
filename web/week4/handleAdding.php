<?php 
    session_start();
    echo "it gets here too?"
    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    echo "it gets here?"
    $products = $_POST["buy"];

    foreach($products as $product) {
        array_push($_SESSION["cart"], $product);
    }

    header("Location: viewCart.php");
    die("Redirected to...");
?>