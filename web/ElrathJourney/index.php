<?php
try
{
  $user = 'weblogin';
  $password = 'elrathsJourney';
  $db = new PDO('pgsql:host=localhost;dbname=elrath', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Elrath's Journey Homepage</title>
        <link rel="stylesheet" type="text/css"  href="elrath.css">
    </head>
    <body>
        <header>
            <h1>Elrath's Journey</h1>
        </header>
        
    </body>
</html>