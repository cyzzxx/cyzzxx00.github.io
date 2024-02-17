<?php
session_start();
include("connection.php");

// Check if the AJAX request contains user ID data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['userId'])) {
    // Get the rejected user ID from the AJAX request
    $rejectUserId = $data['userId'];

    // Update user status to 'rejected' in the database
    $sql = "UPDATE user SET status = 'rejected' WHERE user_id = $rejectUserId";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Set a session variable to indicate the rejected user ID
        $_SESSION['rejected_user_id'] = $rejectUserId;

        // Send a JSON response indicating success
        echo json_encode(['success' => true]);
        exit();
    } else {
        // Send a JSON response indicating failure
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to reject the user.']);
        exit();
    }
} else {
    // Send a JSON response indicating missing data
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing user ID data.']);
    exit();
}
?>
