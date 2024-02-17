<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
   <?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's email address from the form
    $email = $_POST['email'];

    include 'connection.php';

    // Prepare the SQL statement to check if email exists in admin table
    $query = "SELECT COUNT(*) FROM admin WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // Check if the email exists and is valid in the password reset tokens table
        $query = "SELECT * FROM password_reset_tokens_temp WHERE email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $tokenRow = $result->fetch_assoc();
        $stmt->close();

        if ($tokenRow && $tokenRow['isvalid'] == 1) {
            // A valid token exists and is valid, stop sending mail
            echo '<script>
                    Swal.fire({
                        title: "Error",
                        text: "You still have an unused link. Please check your inbox.",
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "initial-forgot-password.php?error=true";
                    });
                  </script>';
        } else {
            // Generate a random password reset token (you can use any method you prefer)
            $token = bin2hex(random_bytes(32));

            if ($tokenRow) {
                // Update the existing token with the new one
                $query = "UPDATE password_reset_tokens_temp SET token = ?, isvalid = 1 WHERE email = ?";
                $stmt = $con->prepare($query);
                $stmt->bind_param('ss', $token, $email);
                $stmt->execute();
                $stmt->close();
            } else {
                // Insert a new row with the token
                $query = "INSERT INTO password_reset_tokens_temp (email, token, isvalid) VALUES (?, ?, 1)";
                $stmt = $con->prepare($query);
                $stmt->bind_param('ss', $email, $token);
                $stmt->execute();
                $stmt->close();
            }

            // Send the password reset email
            try {
                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->SMTPAuth = true;
                $mail->Username = 'feapitsat.core@gmail.com';
                $mail->Password = 'xymj cldt lwcw vumm';
        
                $mail->setFrom('feapitsat.core@gmail.com', 'FEAPITSAT');
                $mail->addAddress($email);
        
                $resetLink ='http://feacore.online/feacore/reset-password.php?token=' . $token;
                $subject = 'Password Reset Request';
                $body = 'Hello,

                We received a request to reset the password associated with this email address. If you made this request, please click the link below to reset your password:

                ' . $resetLink . '

                If you did not request a password reset, please ignore this email. Your password will remain unchanged.

                Thank you,
                FEAPITSAT Team';

                $mail->Subject = $subject;
                $mail->Body = $body;
                if (isset($_GET['success']) && $_GET['success'] === 'true') {
                 echo 'Password reset link has been sent successfully! Check your email.';
                    }

             if ($mail->send()) {
    echo '<script>
        Swal.fire({
            title: "Success",
            text: "Password reset link has been sent successfully! Check your email.",
            icon: "success",
            confirmButtonText: "OK"
        }).then(function() {
            window.location.href = "initial-forgot-password.php?success=true";
        });
      </script>';
exit();

} else {
    // Error sending email
    echo 'An error occurred while sending the email. Please try again.';
}
            } catch (Exception $e) {
                // Exception occurred while sending email
                echo 'An error occurred while sending the email. Please try again.';
            }
        }
    } else {
        // No email match found
        echo 'Email not found';
    }

    // Close the database connection
    mysqli_close($con);
}
?>

</body>
</html>