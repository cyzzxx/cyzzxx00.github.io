<?php
session_start();
include("connection.php");

// Check if the AJAX request contains user ID data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['userId'])) {
    // Get the accepted user ID from the AJAX request
    $acceptedUserId = $data['userId'];

    // Update user status to 'accepted' in the database
    $sqlUpdate = "UPDATE user SET status = 'accepted' WHERE user_id = $acceptedUserId";
    $resultUpdate = mysqli_query($con, $sqlUpdate);

    if ($resultUpdate) {
        // Fetch LRN from the user table for the accepted user
        $sqlSelectLRN = "SELECT lrn FROM user WHERE user_id = $acceptedUserId";
        $resultSelectLRN = mysqli_query($con, $sqlSelectLRN);
        $rowLRN = mysqli_fetch_assoc($resultSelectLRN);
        $lrn = $rowLRN['lrn'];

        // Insert the LRN into the LRN table
        $sqlInsertLRN = "INSERT INTO lrn (student_lrn) VALUES ('$lrn')";
        $resultInsertLRN = mysqli_query($con, $sqlInsertLRN);

        if ($resultInsertLRN) {
            // Set a session variable to indicate the accepted user ID
            $_SESSION['accepted_user_id'] = $acceptedUserId;

            // Send a JSON response indicating success
            echo json_encode(['success' => true]);
            exit();
        } else {
            // Send a JSON response indicating failure in LRN insertion
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to insert LRN into the LRN table.']);
            exit();
        }
    } else {
        // Send a JSON response indicating failure in user acceptance
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to accept the user.']);
        exit();
    }
} else {
    // Send a JSON response indicating missing data
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing user ID data.']);
    exit();
}
?>
