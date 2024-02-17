<?php

if (isset($_GET['result_id'])) {
    // Get the result_id from the URL parameter
    $result_id = $_GET['result_id'];

    // Perform the deletion in your database using prepared statements
    include 'connection.php'; // Include your database connection

    // Prepare the delete query
    $delete_query = "DELETE FROM results WHERE result_id = ?";
    
    // Prepare the statement
    $stmt = $con->prepare($delete_query);

    if ($stmt) {
        // Bind the parameter and execute the statement
        $stmt->bind_param("i", $result_id);
        $stmt->execute();

        // Check if the deletion was successful
        if ($stmt->affected_rows > 0) {
            header("location:admin-records.php");
        } else {
            // No rows were affected (record not found or deletion failed)
            echo "No record found or deletion failed for result_id $result_id.";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Statement preparation failed
        echo "Error preparing statement: " . $con->error;
    }

    // Close the database connection
    $con->close();
} else {
    // result_id parameter is not set in the URL
    echo "No result_id specified for deletion.";
}
?>
