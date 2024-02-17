<?php
include("connection.php");

$message = ""; // Initialize an empty message

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (strpos($email, '@feapitsat.com') === false) {
        // Set an error message for invalid email domain
        echo "Invalid Email";
        exit; // Stop further execution to prevent additional output
    } else {
        $sql = "INSERT INTO contact_messages (email, message) VALUES (?, ?)";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $email, $message);

            if ($stmt->execute()) {
                // Success: Data inserted successfully
                echo "Your feedback has been submitted successfully.";
            } else {
                // Error: Handle the error
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Error: Handle the error
            echo "Error: " . $con->error;
        }
    }
}

// Close the database connection
$con->close();
?>
