<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Results</title>

    <!-- links -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS / JS link -->
    <link rel="stylesheet" href="css/result-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/refnum.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">
    <script type="text/javascript" src="script.js" async></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Sriracha&display=swap" rel="stylesheet">
    <style> html{overflow-y: auto;}</style>
</head>
<body>
<script>history.scrollRestoration = "manual"</script> 
    <!-- Loader Animation -->
    <div class="loader" id="loader">
        <img src="assets/loader/Pulse-1s-104px.svg"/>
    </div>
    <!-- <i class='bx bxs-message-dots'></i> -->
    <header id="home">
        <!-- Default navigation -->
        <nav class="top-navigation" id="topNav">
            <a href="index.php" class="restrict-hidden-logo">
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="Feapitsat" width="100">
            </a>
            <ul>
            <li><a href="index.php" class="restrict-query-links">Back</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Assessment Past Results</h1>
    </main>
    <section>
       <?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $search_query = $_POST['search_query']; // Get the search query (refid) from the submitted form

    // Prepare and execute a query to retrieve user_id based on the provided refid from the user table
    $userQuery = "SELECT user_id, date FROM results WHERE refid = ?";
    $userStmt = mysqli_prepare($con, $userQuery);

    if ($userStmt) {
        mysqli_stmt_bind_param($userStmt, 's', $search_query);
        mysqli_stmt_execute($userStmt);
        $userResult = mysqli_stmt_get_result($userStmt);

        if (mysqli_num_rows($userResult) > 0) {
            echo "<h1>Searched by: $search_query</h1>";
            echo "<table>";
            echo "<tr><th>Course</th><th>Result</th><th>Date of Assessment</th></tr>";

            // Fetch user details and display results
            while ($userRow = mysqli_fetch_assoc($userResult)) {
                $user_id = $userRow['user_id'];
                $user_date = $userRow['date'];

                // Prepare and execute a query to retrieve results from recommended_courses table based on user_id
                $recommendedCoursesQuery = "SELECT * FROM recommended_courses WHERE user_id = ?";
                $recommendedCoursesStmt = mysqli_prepare($con, $recommendedCoursesQuery);

                if ($recommendedCoursesStmt) {
                    mysqli_stmt_bind_param($recommendedCoursesStmt, 's', $user_id);
                    mysqli_stmt_execute($recommendedCoursesStmt);
                    $recommendedCoursesResult = mysqli_stmt_get_result($recommendedCoursesStmt);

                    // Display results in the table row for each user ID
                    while ($row = mysqli_fetch_assoc($recommendedCoursesResult)) {
                        echo "<tr>";
                        echo "<td>" . $row['course1'] . "</td>";
                        echo "<td>" . $row['percent1'] . "%" . "</td>";
                        echo "<td>" . $user_date . "</td>";
                        echo "</tr>";
                    }

                    mysqli_stmt_close($recommendedCoursesStmt);
                } else {
                    echo "Error in preparing statement: " . mysqli_error($con);
                }
            }
            echo "</table>"; // Close the table after displaying all results
        } else {
            // No users found with the provided refid
            echo "<input type='hidden' id='noUsersFound' value='1'>";
        }

        // Close the user statement and database connection
        mysqli_stmt_close($userStmt);
        mysqli_close($con);
    } else {
        echo "Error in preparing statement: " . mysqli_error($con);
    }
}
?>

    </section>
    <!-- JavaScript to display SweetAlert and redirect -->
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const noUsersFound = document.getElementById('noUsersFound');
                if (noUsersFound && noUsersFound.value === '1') {
                    Swal.fire({
                        title: 'No users found',
                        text: 'Redirecting back to search page...',
                        icon: 'error',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2000 // 3 seconds
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                }
            });
        </script>
    <script>
        var loader = document.getElementById("loader");
            window.addEventListener("load", function (){
                setTimeout(() => {
                    loader.style.display = "none";
                }, 100);
            });
    </script>
    <script>
        $(window).resize( function() {
            window.location.href = window.location.href;
        });
    </script>
</body>
</html>
