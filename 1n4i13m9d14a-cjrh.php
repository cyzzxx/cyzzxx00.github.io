<!-- HTML DOCUMENT -->
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS links -->
    <link rel="stylesheet" href="css/admin-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/forms-buttons/forms-buttons-styles.css">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">
    
    <!-- JS links -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <!-- PHP -->
           <?php
        session_start();

        if (isset($_SESSION['id'])) {
            header("Location: admin-dashboard.php");
            exit();
        }

        include("connection.php");

        $emailError = "";
        $passwordError = "";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!empty($email) && !empty($password)) {
                $query = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if (password_verify($password, $user_data['password'])) {
                        $_SESSION['id'] = $user_data['id'];
                        $_SESSION['is_admin'] = true;
                        header("Location: admin-dashboard.php");
                        exit;
                    } else {
                        $passwordError = "Incorrect password<i class='bx bxs-info-circle'></i>";
                        echo "<style>#password { border-color: red; }</style>";
                    }
                } else {
                    $emailError = "Admin not found&nbsp;<i class='bx bxs-info-circle'></i>";
                    echo "<style>#email { border-color: red; }</style>";
                }
            } else {
                echo "<script>alert('Please enter valid information');</script>";
            }
        }
        ?>  

        <div class="main__login-card">
            <form action="" method="post" class="form-controls login-card">
                <h1>Sign In</h1>
                <input type="email" name="email" id="email" placeholder="<?php echo $emailError ? 'Admin not found' : 'Email:'; ?>" autocomplete="off" required <?php echo $emailError ? 'class="error"' : ''; ?>>
                <input type="password" name="password" id="password" placeholder="<?php echo $passwordError ? 'Incorrect password' : 'Password:'; ?>" autocomplete="new-password" required <?php echo $passwordError ? 'class="error"' : ''; ?>>
                <a href="initial-forgot-password.php" class="forgot-password-link">Forgot Password?</a>
                <button type="submit" class="button-controls login-card__button">Log In</button>
            </form>
        </div>
    </main> 
    <!-- Script -->
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var emailInput = document.getElementById("email");
            emailInput.value = "";
        });
    </script>
</body>
</html>