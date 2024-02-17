<?php
session_start();

if (!isset($_GET['user_id'])) {
        header("location: index.php");
        exit();
    } else {
        $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter


if (isset($_SESSION['recommendedCourses'])) {
    $recommendedCourses = $_SESSION['recommendedCourses'];

    // Prepare data for JavaScript
    $chartData = [];
    foreach ($recommendedCourses as $key => $course) {
        if ($key === 'course1' || $key === 'course2' || $key === 'course3' || $key === 'course4' || $key === 'course5') {
            $countKey = 'count' . substr($key, -1);
            $chartData[] = [
                'course' => $course,
                'count' => $recommendedCourses[$countKey],
            ];
        }
    }

    // Convert data to JSON
    $chartDataJson = json_encode($chartData);
} else {
    // No recommended courses found
    $chartDataJson = '[]'; // Provide an empty array as default
}

}
?>
<?php

// Check if grouped assigned courses are available in the session
if (isset($_SESSION['grouped_assigned_courses'])) {
    $grouped_assigned_courses = $_SESSION['grouped_assigned_courses'];

    // Sort the grouped assigned courses based on "YES" counts in descending order
    arsort($grouped_assigned_courses);

    // Get the top 5 grouped assigned courses
    $top5_grouped_assigned_courses = array_slice($grouped_assigned_courses, 0, 5);


    }

?>

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
    <link rel="stylesheet" href="css/basis-styles.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="script.js" async></script>
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">

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
            <li><a href="alter-result.php?user_id=<?php echo $user_id; ?>" class="restrict-query-links">Back</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Assessment Data Basis</h1>
    </main>
    <section>
        <div class="section__bar-chart--wrapper">
            <h2>Academic Questions Results</h2>
            <canvas id="barChart" width="400" height="300"></canvas>
        </div>
        <div class="section__top-bar-chart--wrapper">
            <h2>Interest Questions Results</h2>
            <canvas id="TopbarChart" width="400" height="300"></canvas>
        </div>
    </section>
    <div class="section__table--wrapper">
            <table>
                <caption>Rating Table</caption>
                <tr>
                    <th>Raw Score</th>
                    <th>Equivalent Score</th>
                    <th>Remarks</th>
                </tr>
                    <?php
                        include("connection.php");

                        // Retrieve rating data from the 'rating' table
                        $ratingQuery = "SELECT * FROM rating";
                        $ratingResult = mysqli_query($con, $ratingQuery);

                        if ($ratingResult) {
                            while ($row = mysqli_fetch_assoc($ratingResult)) {
                                echo "<tr>";
                                echo "<td>" . $row['raw'] . "</td>";
                                echo "<td>" . $row['equivalent'] . "</td>";
                                echo "<td>" . $row['remarks'] . "</td>";
                                echo "</tr>";
                            }

                            mysqli_free_result($ratingResult);
                        } else {
                            echo "Error retrieving rating data: " . mysqli_error($con);
                        }
                    ?>
            </table>
        </div>
    
    <script>
        var chartData = <?php echo $chartDataJson; ?>;

        var labels = chartData.map(function(item) {
            return item.course;
        });

        var data = chartData.map(function(item) {
            return item.count;
        });

        var ctx = document.getElementById('barChart').getContext('2d');

        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Correct Answers',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Adjust color as needed
                    borderColor: 'rgba(75, 192, 192, 1)', // Adjust color as needed
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    x: {
                        display: false, // Set display to false to hide x-axis labels
                    },
                    y: {
                        beginAtZero: true,
                        max: 10, // Set max to 10 to include 10 in the y-axis
                    },
                },
                responsive: false,
                maintainAspectRatio: false,
            },
        });
    </script>

    <script>
        // PHP-generated data
        var groupedAssignedCourses = <?php echo json_encode($grouped_assigned_courses); ?>;

        // Extract labels and data for Chart.js
        var labelsTop = Object.keys(groupedAssignedCourses);
        var dataTop = Object.values(groupedAssignedCourses);

        var ctxTop = document.getElementById('TopbarChart').getContext('2d');

        var barChartTop = new Chart(ctxTop, {
            type: 'bar',
            data: {
                labels: labelsTop,
                datasets: [{
                    label: 'Number of "YES" Responses',
                    data: dataTop,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    x: {
                        display: false, // Set display to false to hide x-axis labels
                    },
                    y: {
                        beginAtZero: true,
                        max: 10, // Set max to 10 to include 10 in the y-axis
                        title: {
                            display: true,
                            text: 'Number of "YES" Responses'
                        }
                    },
                },
                responsive: false,
                maintainAspectRatio: false,
            },
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
    <script type="text/javascript">
        function courseRedirection(){
            window.location.href = "user-course-list.php";
        }
    </script>
    <script>
    function confirmEndProgress() {
        Swal.fire({
            title: 'Congrats!',
            text: 'You have successfully completed the assessment. Thank you for using our service!',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                  // Clear local storage before ending the session
            localStorage.clear();
                window.location.href = 'logout-user.php';
            }
        });
    }
    </script>
</body>
</html>
