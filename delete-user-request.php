<?php
session_start();
include("connection.php");

if (!isset($_SESSION['id'])) {
    header("Location: 1n4i13m9d14a-cjrh.php");
    exit();
}

if (!isset($_GET['user_id'])) {
    header("Location: admin-approval.php");
    exit();
}

$user_id = $_GET['user_id'];

$query = "DELETE FROM user WHERE user_id = $user_id";
$result = $con->query($query);

if ($result) {
    echo json_encode(['success' => true]);
    exit;
} else {
    echo json_encode(['error' => 'Error deleting user']);
    exit;
}
?>
