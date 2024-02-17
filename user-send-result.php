<?php
// Include necessary files and start session
include("connection.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_GET['user_id'])) {
        header("location: index.php");
        exit();
    } else {
        $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter


    // Fetch the user's email from the database
    $user_email = '';
    $selectEmailSql = "SELECT email FROM user WHERE user_id = ?";
    $stmt_select_email = mysqli_prepare($con, $selectEmailSql);

    if ($stmt_select_email) {
        mysqli_stmt_bind_param($stmt_select_email, 's', $user_id);
        mysqli_stmt_execute($stmt_select_email);
        mysqli_stmt_bind_result($stmt_select_email, $user_email);

        if (mysqli_stmt_fetch($stmt_select_email)) {
            mysqli_stmt_close($stmt_select_email);

            // Fetch the top 1 result and relevant information
            $percent1 = '';
            $recommendedCourse = ''; // Initialize recommended course variable

            $selectPercentSql = "SELECT percent1 FROM recommended_courses WHERE user_id = ?";
            $stmt_select_percent = mysqli_prepare($con, $selectPercentSql);

            if ($stmt_select_percent) {
                mysqli_stmt_bind_param($stmt_select_percent, 's', $user_id);
                mysqli_stmt_execute($stmt_select_percent);
                mysqli_stmt_bind_result($stmt_select_percent, $percent1);

                if (mysqli_stmt_fetch($stmt_select_percent)) {
                    mysqli_stmt_close($stmt_select_percent);

                    // Fetch recommended course for the user
                    $selectCoursesSql = "SELECT course1 FROM recommended_courses WHERE user_id = ?";
                    $stmt_select_courses = mysqli_prepare($con, $selectCoursesSql);

                    if ($stmt_select_courses) {
                        mysqli_stmt_bind_param($stmt_select_courses, 's', $user_id);
                        mysqli_stmt_execute($stmt_select_courses);
                        mysqli_stmt_bind_result($stmt_select_courses, $recommendedCourse);

                        if (mysqli_stmt_fetch($stmt_select_courses)) {
                            mysqli_stmt_close($stmt_select_courses);

                            require 'PHPMailer/src/PHPMailer.php';
                            require 'PHPMailer/src/SMTP.php';
                            require 'PHPMailer/src/Exception.php';

                            try {
                                $mail = new PHPMailer(true);

                                // SMTP configuration
                                $mail->isSMTP();
                                $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
                                $mail->SMTPAuth   = true;
                                $mail->Username   = 'feapitsat.core@gmail.com'; // Replace with your SMTP username
                                $mail->Password   = 'xymj cldt lwcw vumm'; // Replace with your SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                                $mail->Port       = 587; // SMTP port

                                // Email content
                                $mail->setFrom('feapitsat.core@gmail.com','FEAPITSAT');
                                $mail->addAddress($user_email); // Add recipient
                                $mail->isHTML(false); // Set email format to plain text
                                $mail->Subject = 'Assessment Result for FEAPITSAT Course Recommender';
                                $mail->Body = "Hello, 
                Your top recommended course based on your Interest and Knowledge is: $recommendedCourse. The system suggests this course as it has a $percent1%  match of your interests and knowledge.

Thank You,
FEAPITSAT";
                                // Send email
                                $emailSent = $mail->send();

                                // Regardless of email sending success or failure, redirect to alter-results.php
                                header("Location: alter-result.php?user_id=$user_id");
                                exit();
                            } catch (Exception $e) {
                                // Handle exceptions if any occur during the email sending process
                                // This block will run if there's an exception while sending the email

                                // You can log the exception or handle it as per your requirement
                                // In this example, it's just redirecting to alter-results.php even on email send failure

                                header("Location: alter-result.php?user_id=$user_id");
                                exit();
                            }
                        } else {
                            echo "No recommended course found.";
                        }
                    } else {
                        die("Database query failed: " . mysqli_error($con));
                    }
                } else {
                    echo "No top result found.";
                }
            } else {
                die("Database query failed: " . mysqli_error($con));
            }
        } else {
            die("Database query failed: " . mysqli_error($con));
        }
    }
}
?>
