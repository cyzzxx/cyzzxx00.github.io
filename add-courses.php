<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_course'])) {
        $course_name = $_POST['course_name'];
        $description = $_POST['description'];
        $strand = $_POST['strand'];

        // Sanitize input data to prevent code execution
        $course_name = htmlspecialchars($course_name);
        $description = htmlspecialchars($description);
        $strand = htmlspecialchars($strand);

        if (!empty($course_name)) {
            $course_id = mt_rand(10000000, 99999999);

            // Use prepared statements to avoid SQL injection
            $query = "INSERT INTO courses (course_id, course_name, description, strand) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'ssss', $course_id, $course_name, $description, $strand);

            if (mysqli_stmt_execute($stmt)) {
                // Course added successfully, redirect to admin-courses.php
                header("Location: admin-courses.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    } elseif (isset($_POST['return'])) {
        header("Location: admin-courses.php");
        exit;
    }
}

?>
