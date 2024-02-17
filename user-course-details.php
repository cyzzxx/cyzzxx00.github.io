<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS links -->
    <link rel="stylesheet" href="css/course-details-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">
    <!-- JS links -->
    <script src="script.js" async></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
    <!-- End of Loader -->
    <header id="home">
        <!-- Default navigation -->
        <nav class="top-navigation">
            <a href="index.php" class="restrict-hidden-logo">
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="CORE" width="100">
            </a>
            <ul class="top-ul">
                <li><a href="index.php">Home</a></li>
                <li><a href="user-course-list.php" class="restrict-query-links">Back</a></li>
                        
            </ul>
        </nav>
    </header>
    <div class="course-content-container">
        <?php
            // Check if a course ID is provided in the URL
            if (isset($_GET['course_id'])) {
                $courseId = $_GET['course_id'];

                // Fetch course details from the database based on the course ID
                $sql = "SELECT * FROM courses WHERE course_id = $courseId"; // Replace 'id' with your actual primary key column name
                $result = mysqli_query($con, $sql);

                if (!$result) {
                    die("Database query failed: " . mysqli_error($con));
                }

                // Check if a course with the specified ID exists
                if (mysqli_num_rows($result) > 0) {
                    // Fetch and display course details
                    $course = mysqli_fetch_assoc($result);
                    $courseName = $course['course_name'];
                    $description = $course['description'];

                    // Display the course details in your HTML
                    // You can format this as needed
                    echo "<div class='course-detail-main-container'>";
                    echo "<div class='course-name-header-detail'><h1>$courseName</h1></div>";
                    echo "<div class='course-description-container'><h2>$courseName</h2><p>$description</p></div>";
                    echo "</div>";
                } else {
                    // Handle the case where the course ID does not exist
                    echo "Course not found";
                }
            } else {
                // Handle the case where no course ID is provided in the URL
                echo "Invalid request";
            }
        ?>
    </div>
    <script>
        function previousCoursePage(){
            window.location.href = "user-course-list.php"
        }
    </script>
    <script>
        var loader = document.getElementById("loader");
        window.addEventListener("load", function (){
            setTimeout(() => {
                loader.style.display = "none";
            }, 1000);                  
        });
    </script>
    <script type="text/javascript">
        function courseRedirection(){
            window.location.href = "user-course-list.php";
        }
    </script>
    <script>
        $(window).resize( function() {
            window.location.href = window.location.href;
        });
    </script> 
</body>
</html>

