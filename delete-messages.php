<?php
session_start();
include("connection.php");
if(!isset($_SESSION['id']))
    {
        header("location:1n4i13m9d14a-cjrh.php");
        exit();
    }

if (!isset($_SESSION['id'])) {
    // Handle unauthorized access, e.g., redirect to a login page
    header("location:1n4i13m9d14a-cjrh.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_message_id'])) {
    // Handle message deletion when a POST request is made
    $messageId = $_POST['delete_message_id'];

    // Query to delete the message from the database
    $deleteSql = "DELETE FROM contact_messages WHERE id = $messageId";

    if (mysqli_query($con, $deleteSql)) {
        // Deletion was successful
        echo json_encode(['success' => true]);
        exit();
    } else {
        // Deletion failed
        echo json_encode(['success' => false]);
        exit();
    }
}
