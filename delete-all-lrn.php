<?php
include("connection.php");

function deleteAllDataFromlrn($lrn) {
    global $con;

    // SQL query to delete all data from the specified table
    $sql = "DELETE FROM $lrn";

    if ($con->query($sql) === TRUE) {
        header("location: student-lrn.php");
    } else {
        echo "Error deleting data: " . $con->error;
    }
}

// Call the function with the table name you want to delete data from
deleteAllDataFromlrn("lrn");

// Close the database connection
$con->close();
?>
