<?php
include("connection.php");


if (isset($_POST['update_submit'])) {
    $update_question_id = $_POST['update_question_id'];
    $new_question_name = $_POST['new_question_name'];

    // Update question_abm_int
    $update_query_int = "UPDATE question_abm_int SET question_text = ? WHERE id = ?";
    $stmt_int = mysqli_prepare($con, $update_query_int);
    mysqli_stmt_bind_param($stmt_int, "si", $new_question_name, $update_question_id);
    mysqli_stmt_execute($stmt_int);
    mysqli_stmt_close($stmt_int);

    // Update question_abm_acad
    $update_query_acad = "UPDATE question_abm_acad SET question_text = ? WHERE id = ?";
    $stmt_acad = mysqli_prepare($con, $update_query_acad);
    mysqli_stmt_bind_param($stmt_acad, "si", $new_question_name, $update_question_id);
    mysqli_stmt_execute($stmt_acad);
    mysqli_stmt_close($stmt_acad);

    header("Location: admin-abm-questions.php"); // Redirect back to the page
    exit();
}
?>
