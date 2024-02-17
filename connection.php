<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "feacore";

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

return $con; // Return the connection object
?>
