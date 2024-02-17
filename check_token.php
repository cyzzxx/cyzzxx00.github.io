<?php
include("connection.php");


    $token = $_POST['token'];
    
    if (isset($token)) {
        $query = "SELECT * FROM password_reset_tokens_temp WHERE token = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            // Valid token
            echo "valid";
        } else {
            // Invalid token
            echo "invalid";
        }
    } else {
        // Invalid request
        http_response_code(400);
        echo "Invalid request";
    }


?>