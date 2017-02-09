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
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href=""><input type="button" class="button" value="Log In"></a>
    </body>
</html>