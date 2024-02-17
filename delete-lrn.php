<?php
include("connection.php");

if (isset($_GET['deleteid'])) {
    $lrn = $_GET['deleteid'];

    if (isset($_GET['confirmed']) && $_GET['confirmed'] == 1) {
        $id = $_GET['deleteid']; // Change variable name to $id
        $sql = "DELETE FROM lrn WHERE id = $id"; // Fix variable name used in the SQL query
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Reset the auto-increment sequence
            $resetSql = "ALTER TABLE lrn AUTO_INCREMENT = 1";
            mysqli_query($con, $resetSql);

            header("Location: student-lrn.php");
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
}
?>
