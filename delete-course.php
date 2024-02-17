<?php
include("connection.php");

if (isset($_GET['deleteid'])) {
    $course_id = $_GET['deleteid'];

    if (isset($_GET['confirmed']) && $_GET['confirmed'] == 1) {
        $sql = "DELETE FROM courses WHERE course_id = $course_id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Reset the auto-increment sequence
            $resetSql = "ALTER TABLE courses AUTO_INCREMENT = 1";
            mysqli_query($con, $resetSql);

            // Redirect to admin-courses.php after successful deletion
            header("Location: admin-courses.php");
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
}
?>
