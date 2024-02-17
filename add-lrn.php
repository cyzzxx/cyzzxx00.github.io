<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_lrn'])) { // Check for 'add_lrn' button
        $student_lrn = mysqli_real_escape_string($con, $_POST['student_lrn']);

        if (!empty($student_lrn)) {
            // Use prepared statements to avoid SQL injection
            $query = "INSERT INTO lrn (student_lrn) VALUES (?)";
            $stmt = mysqli_prepare($con, $query);
            
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 's', $student_lrn);

            if (mysqli_stmt_execute($stmt)) {
                // LRN added successfully, redirect to student-lrn.php
                header("Location: student-lrn.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    } elseif (isset($_POST['return'])) {
        header("Location: student-lrn.php");
        exit;
    }
}
?>