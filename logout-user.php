<?php
session_start();
session_destroy();
header("location: index.php"); // Redirect the user to the index page after destroying the session
exit();
?>