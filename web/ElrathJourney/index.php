<?php

function get_db() {
	$db = NULL;
	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		if (!isset($dbUrl) || empty($dbUrl)) {
			$dbUrl = "postgres://weblogin:elrathsJourney@localhost:5432/elrath";
		}
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["localhost"];
		$dbPort = $dbopts["5432"];
		$dbUser = $dbopts["weblogin"];
		$dbPassword = $dbopts["elrathsJourney"];
		$dbName = ltrim($dbopts["elrath"],'/');
		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		echo "Error connecting to DB. Details: $ex";
		die();
	}
	return $db;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Elrath's Journey Homepage</title>
        <link rel="stylesheet" type="text/css"  href="elrath.css">
    </head>
    <body>
        <?php
        
            $db = get_db();
        
            $statement = $db->perpare("SELECT user_name, password FROM login;");
            $statement->execute();
        
        
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                echo '<h1>';
                echo $row['user_name'] . ' ' . $row['password'];
                echo '</h1>';
            }
        
        ?>
    </body>
</html>