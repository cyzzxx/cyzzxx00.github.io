<?php
include 'connection.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Prepare statements for deletion
    $delete_topcourse_sql = "DELETE FROM topcourse_interest WHERE user_id = ?";
    $delete_user_sql = "DELETE FROM user WHERE user_id = ?";

    // Prepare and bind parameters
    $delete_topcourse_stmt = $con->prepare($delete_topcourse_sql);
    $delete_user_stmt = $con->prepare($delete_user_sql);

    if (
        $delete_topcourse_stmt &&
        $delete_user_stmt
    ) {
        $delete_topcourse_stmt->bind_param("i", $user_id);
        $delete_user_stmt->bind_param("i", $user_id);

        // Execute deletion queries
        $delete_topcourse_stmt->execute();
        $delete_user_stmt->execute();

        // Close statements
        $delete_topcourse_stmt->close();
        $delete_user_stmt->close();

        header("location: index.php");
        exit();
    } else {
        echo "Prepare statement error: " . $con->error;
    }

    $con->close();
} else {
    echo "No user_id provided.";
}
