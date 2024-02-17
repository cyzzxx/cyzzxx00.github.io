<?php
include("connection.php");

if (isset($_POST['update_submit'])) {
    $update_course_id = $_POST['update_course_id'];
    $new_course_name = $_POST['new_course_name'];
    $description = $_POST['description'];

    // Sanitize input data to prevent code execution
    $update_course_id = intval($update_course_id); // Assuming course_id is an integer
    $new_course_name = htmlspecialchars($new_course_name);
    $description = htmlspecialchars($description);

    // Use prepared statements to update the record
    $update_query = "UPDATE courses SET course_name=?, description=? WHERE course_id=?";
    $stmt = mysqli_prepare($con, $update_query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssi', $new_course_name, $description, $update_course_id);

    if (mysqli_stmt_execute($stmt)) {
        // Update successful, redirect to admin-courses.php
        header("Location: admin-courses.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
