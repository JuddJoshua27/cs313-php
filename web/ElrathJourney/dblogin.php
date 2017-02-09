<?php
include "dbcontrol.php";

$comm = get_db();

$username = $_POST('username');
$password = $_POST('pword');

echo "the username is: $username";
echo "the password is: $password";

?>