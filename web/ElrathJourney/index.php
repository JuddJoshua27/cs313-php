<?php
    function get_db() {
	$db = NULL;
	try {
		$dbUrl = getenv('DATABASE_URL');
        
		if (!isset($dbUrl) || empty($dbUrl)) {
			$dbUrl = "postgres://weblogin:elrathsJourney@localhost:5432/elrath";
		}
		// Get the various parts of the DB Connection from the URL
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');
		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        echo "<h1>Connected Successfully!</h1>";
	}
	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
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
            
            $conn = get_db();
            echo "<h1>Thingy Created correctly</h1>";
            $statement = $conn->perpare("SELECT item_name, description FROM inventory");
            echo "<h1>here?</h1>";
            $statement->execute();
            echo "<h1>Query asked rightly</h1>";
        
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                echo '<h1>';
                echo $row['item_name'] . ' : ' . $row['description'];
                echo '</h1>';
                echo "<h1>output?</h1>";
            }

        ?>
    </body>
</html>