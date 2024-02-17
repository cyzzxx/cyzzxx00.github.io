<?php
include("connection.php");
if(!isset($_SESSION['id']))
    {
        header("location:index.php");
        exit();
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO contact_messages (email, message) VALUES ('$email', '$message')";

    if ($con->query($sql) === TRUE) {
       
        echo "thank_you!!"; 
    } else {
      
        echo "Error: " . $con->error;
    }

    $con->close();
}
?>
