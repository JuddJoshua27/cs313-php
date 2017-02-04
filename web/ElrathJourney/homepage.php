<?php
    require "index.php";
    $db = get_db();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Elrath's Journey Homepage</title>
        <link rel="stylesheet" type="text/css"  href="elrath.css">
    </head>
    <body>
        <?php
         
        $statement = $db->prepare("SELECT * FROM login");
        $statement->execute();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo '<strong>' . $row['user_name'] . ' ' . $row['password'] . ':';
	echo '</p>';
}
        ?>
    </body>
</html>