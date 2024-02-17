<?php
session_start();
include("connection.php");

if (!isset($_SESSION['id'])) {
    header("location:1n4i13m9d14a-cjrh.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
    $file = $_FILES["csv_file"]["tmp_name"];

    if (empty($file) || !file_exists($file)) {
        echo "Error: File not uploaded or does not exist.";
        exit();
    }

    $handle = fopen($file, "r");

    if ($handle !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $student_lrn = $data[0];
            if (preg_match('/^\d{12}$/', $student_lrn)) {
                $checkSql = "SELECT * FROM lrn WHERE student_lrn = '$student_lrn'";
                $checkResult = mysqli_query($con, $checkSql);

                if (mysqli_num_rows($checkResult) > 0) {
                    $updateSql = "UPDATE lrn SET student_lrn = '$student_lrn' WHERE student_lrn = '$student_lrn'";
                    mysqli_query($con, $updateSql);
                } else {
                    $insertSql = "INSERT INTO lrn (student_lrn) VALUES ('$student_lrn')";
                    mysqli_query($con, $insertSql);
                }
            } else {
                echo "Error: LRN '$student_lrn' is not a 12-digit number. Skipping insertion.";
            }
        }

        fclose($handle);
        header("location:student-lrn.php");
        exit();
    } else {
        echo "Error: Failed to open the uploaded file.";
        exit();
    }
} else {
    header("location:student-lrn.php");
    exit();
}

?>
