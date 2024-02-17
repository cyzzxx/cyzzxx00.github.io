<!-- PHP -->
<?php
include("connection.php");
session_start();

// Assuming the user_id is passed via $_GET['user_id']
if (!isset($_GET['user_id'])) {
    header("location: index.php");
}
?>

<!-- HTML DOCUMENT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEA - Validation</title>

    <!-- links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS / JS link -->
    <link rel="stylesheet" href="css/user-request-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">
    <script src="script.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Sriracha&display=swap" rel="stylesheet">

</head>
<body>
    <script>history.scrollRestoration = "manual"</script>
    <!-- Loader -->
    <div class="loader" id="loader">
        <img src="assets/loader/Pulse-1s-104px.svg"/>
    </div>
    <header id="home">
        <!-- Default navigation -->
        <nav class="top-navigation" id="topNav">
             <a href="javascript:void(0);" onclick="confirmEndProgress()" class="restrict-hidden-logo">
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="CORE" width="100">
            </a>
            <ul>
            <li><a href="javascript:void(0);" onclick="confirmEndProgress()">Home</a></li>
            </ul>
            <i class='bx bx-menu' id="bxMenu" onclick="funcShow()"></i>
            <i class='bx bx-x' id="bxX" onclick="funcHide()"></i>
        </nav>
    <!-- Side Nav -->
    <div class="side-nav" id="sideNav">
        <div class="side-navigation" id="sideNavRight">
            <div class="hr-divider side-hr"></div>
                <ul>
            <li><a href="javascript:void(0);" onclick="confirmEndProgress()">Home</a></li>
                    <div class="hr-divider side-hr side-hid"></div>
                </ul>
        </div>
    </div>
    
<?php
include("connection.php");

function getUserStatus($user_id, $con) {
    // Sanitize and validate $user_id to prevent SQL injection
    $sanitized_user_id = mysqli_real_escape_string($con, $user_id);

    // Perform a database query to retrieve user status based on user_id
    $query = "SELECT status FROM user WHERE user_id = '$sanitized_user_id'";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $status = $row['status'];
            return $status;
        } else {
            return 'not_found';
        }
    } else {
        return 'error';
    }
}

// Assuming the user_id is passed via $_GET['user_id']
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

    $status = getUserStatus($user_id, $con); // Replace $con with your actual database connection object

    if ($status === 'accepted') {
        // Display appropriate content for an accepted user
        ?>
        <!-- Script for displaying SweetAlert for accepted user -->
        <script>
            // Display SweetAlert for accepted user
            Swal.fire({
                title: 'User Accepted',
                text: 'Your request has been accepted.',
                icon: 'success',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then(() => {
                // Redirect to user-strand-selection-page.php after the alert is closed
                window.location.href = 'user-strand-selection.php?user_id=<?php echo $user_id; ?>';

            });
        </script>

        <!-- Rest of your HTML content -->
        <section class="user-request-section"> 
            <div class="request-tool">
                <h2>Your request has been accepted.</h2><br><br>
                <span>Refresh the page for confirmation</span>
            </div>
        </section>
        <?php
    } elseif ($status === 'rejected') {
        // Display appropriate content for a rejected user
        ?>
        <!-- Script for displaying SweetAlert for rejected user -->
        <script>
            // Display SweetAlert for rejected user
            Swal.fire({
                title: 'User Rejected',
                text: 'Your request has been rejected.',
                icon: 'error',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then(() => {
                // Redirect or perform other actions after the alert is closed
                window.location.href = 'index-endhome.php?user_id=<?php echo $user_id; ?>';
            });
        </script>

        <!-- Rest of your HTML content -->
        <section class="user-request-section"> 
            <div class="request-tool">
                <h2>Your request has been rejected.</h2><br><br>
                <span>Refresh the page for confirmation</span>
            </div>
        </section>
        <?php
    } elseif ($status === 'not_found') {
        // Display appropriate content for a user not found
        ?>
        <!-- Rest of your HTML content -->
        <section class="user-request-section"> 
            <div class="request-tool">
                <h2>User ID not found.</h2><br><br>
                <span>Please wait for the admin approval. Thank You!</span>
            </div>
        </section>
        <?php
    } elseif ($status === 'error') {
        // Display appropriate content for a database query error
        ?>
        <!-- Rest of your HTML content -->
        <section class="user-request-section"> 
            <div class="request-tool">
                <h2>Error fetching user status.</h2><br><br>
                <span>Please wait for the admin approval. Thank You!</span>
            </div>
        </section>
        <?php
    } else {
        // Default content or handling for other cases
        ?>
        <!-- Rest of your HTML content -->
        <section class="user-request-section"> 
            <div class="request-tool">
                <h2>Please wait for the admin approval. Thank You!</h2><br><br>
                <span>Refresh the page for confirmation</span>
            </div>
        </section>
        <?php
    }
} else {
    // Display default content if $_GET['user_id'] is not set
    ?>
    <!-- Rest of your HTML content -->
    <section class="user-request-section"> 
        <div class="request-tool">
            <h2>No user ID found in the URL.</h2><br><br>
            <span>Please provide a valid user ID.</span>
        </div>
    </section>
    <?php
}
?>





    <!-- footer -->
    <footer>
        <div class="footer-links-row">
            <div class="footer-links-columns">
                <h3>Office <div class="underline-animation"><span></span></div></h3>
                <p>2nd Flr. JIM Bldg. Daang Amaya 1, Tanza, Cavite, 4108</p>
                <a href="#">feapitsatcollegesregistrar@gmail.com</a> 
            </div>         
            <div class="footer-links-columns">        
                <h3>Links <div class="underline-animation"><span></span></div></h3>
                <li>Home</li>
                <li>About</li>
                <li>Courses</li>
                <li>Contact</li>           
            </div>
                <div class="footer-links-columns">
                    <h3>Socials <div class="underline-animation"><span></span></div></h3>
                    <div class="footer-social-icons">
                        <i class='bx bxl-facebook'></i>
                        <i class='bx bxl-instagram' ></i>
                        <i class='bx bxl-youtube' ></i>
                        <i class='bx bxl-github' ></i>
                        <i class='bx bxl-discord-alt' ></i>
                </div>
            </div>
        </div>
        <hr>
        <h3 class="footer-copyrights">© All Rights Reserved - 2023 FEAPITSAT</h3>
    </footer>

    <!-- SCRIPT -->
    
    <script>
        var loader = document.getElementById("loader");
        window.addEventListener("load", function (){
            setTimeout(() => {
                loader.style.display = "none";
            }, 1000);
        });
    </script> 
 <script>
        function confirmEndProgress() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This will end your progress. Are you sure you want to end it?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, end it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes, end it!", navigate to the specified link
                    window.location.href = 'index-endhome.php?user_id=<?php echo $user_id; ?>';
                }
                });
        }
    </script>
   
</body>
</html>