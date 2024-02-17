<?php
include("connection.php");

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Delete from question_humss_int
    $sql_int = "DELETE FROM question_humss_int WHERE id = $id";
    $result_int = mysqli_query($con, $sql_int);

    // Delete from question_humss_acad
    $sql_acad = "DELETE FROM question_humss_acad WHERE id = $id";
    $result_acad = mysqli_query($con, $sql_acad);

    // Check if either deletion was successful
    if ($result_int || $result_acad) {
        header("Location: admin-humss-questions.php");
        exit();
    } else {
        die(mysqli_error($con));
    }
}
?>
