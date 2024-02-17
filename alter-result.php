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
    <title>User | Results</title>

    <!-- links -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS / JS link -->
    <link rel="stylesheet" href="css/result-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
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
    <!-- Loader -->
    <div class="loader" id="loader">
		<img src="assets/loader/Pulse-1s-104px.svg"/>
	</div>
    <header id="home">
        <!-- Default navigation -->
        <nav class="top-navigation" id="topNav">
            <a class="restrict-hidden-logo">
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="FEAPITSAT" width="100" onclick="confirmEndProgress()">
            </a>
            <ul>
                <li><a href="javascript:void(0);" class="restrict-query-links" onclick="confirmEndProgress()">Home</a></li>                   
            </ul>
            <i class='bx bx-menu m-rst' id="bxMenu" onclick="funcShow()"></i>
            <i class='bx bx-x x-rst' id="bxX" onclick="funcHide()"></i>
        </nav>
    </header>
    <!-- Side navigation for mobile view -->
    <aside class="side-nav" id="sideNav">
        <div class="side-navigation" id="sideNavRight">
            <div class="hr-divider side-hr"></div>
                <ul class="side-link-card">
                <li><a href="javascript:void(0);" class="restrict-query-links" onclick="confirmEndProgress()">Home</a></li>
                </ul> 
        </div> 
    </aside>
    <!-- Container wrapper / Result page -->
    <main class="result-wrapper">
        <div class="wrapper__result-overlay--card">
            <div class="card__main-result--description">
                <h1>Your Result</h1>
                <div class="score-percentage">
                  <?php
                        // Assuming the user_id is passed via $_GET['user_id']
                        if (isset($_GET['user_id'])) {
                            $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

                            $selectPercentSql = "SELECT percent1 FROM recommended_courses WHERE user_id = ?";
                            $stmt_select_percent = mysqli_prepare($con, $selectPercentSql);

                            if ($stmt_select_percent) {
                                mysqli_stmt_bind_param($stmt_select_percent, 's', $user_id); // Use $user_id from $_GET
                                mysqli_stmt_execute($stmt_select_percent);
                                mysqli_stmt_bind_result($stmt_select_percent, $percent1);

                                // Fetch the result
                                if (mysqli_stmt_fetch($stmt_select_percent)) {
                                    // Display the user's percent1
                                    echo "<h1>$percent1%</h1>";

                                    // Determine the appropriate message based on $percent1 using an array
                                    $messages = array(
                                        100 => "Congratulations! You achieved a perfect score in",
                                        90 => "Excellent job! You earned an impressive score in",
                                        80 => "Keep up the good work! You have a solid understanding in",
                                        70 => "Well done! You have a great understanding in",
                                        60 => "Good job! Use this as an opportunity for improvement in",
                                        50 => "Keep pushing forward! Identify areas for growth and improvement in ",
                                        40 => "There's room for improvement. Use this as motivation to get in",
                                        30 => "Consider retaking the assessment as you got a weak score in",
                                        20 => "A retake is necessary. Dedicate more time to study if you really want to get in",
                                        10 => "A retake is strongly recommended to reassess your knowledge in",
                                        0  => "I'm sorry but you have to retake the Assessments"
                                    );

                                    mysqli_stmt_close($stmt_select_percent);
                                } else {
                                    die("Database query failed: " . mysqli_error($con));
                                }
                            }
                        }
                        ?>

                </div>
                    <h2 class="remarks-identifier">
                     <?php
                        // Assuming the user_id is passed via $_GET['user_id']
                        if (isset($_GET['user_id'])) {
                            $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

                            // Retrieve count1 from recommended_courses
                            $count1Result = mysqli_query($con, "SELECT count1 FROM recommended_courses WHERE user_id = '$user_id'");
                            $count1Row = mysqli_fetch_assoc($count1Result);
                            $count1 = $count1Row['count1'];

                            if ($count1 !== null) { // Use strict comparison to also check for null
                                // Retrieve remarks from rating based on count1
                                $remarksResult = mysqli_query($con, "SELECT remarks FROM rating WHERE raw = '$count1'");

                                if ($remarksResult !== false && mysqli_num_rows($remarksResult) > 0) {
                                    // Fetch the remarks
                                    $remarksRow = mysqli_fetch_assoc($remarksResult);
                                    $remarks = $remarksRow['remarks'];

                                    // Display the remarks in an h2 tag
                                    echo "<span style='margin: 0; color: hsl(0,100%,99.8%);'>$remarks</span>";
                                } else {
                                    // Handle the case where no remarks are found
                                    echo "<span style='hsl(353, 69%, 53%)'>No rating remarks found for count1: $count1</span>";
                                }
                            } else {
                                // Handle the case where $count1 is null
                                echo "<span style='hsl(353, 69%, 53%)'>No count1 found for the user.</span>";
                            }
                        }
                        ?>

                    </h2>
                        <section class="description">
                        <?php
                            // Assuming the user_id is passed via $_GET['user_id']
                            if (isset($_GET['user_id'])) {
                                $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

                                $selectCoursesSql = "SELECT course1 FROM recommended_courses WHERE user_id = ?";
                                $stmt_select_courses = mysqli_prepare($con, $selectCoursesSql);

                                if ($stmt_select_courses) {
                                    mysqli_stmt_bind_param($stmt_select_courses, 's', $user_id); // Use $user_id instead of $userId
                                    mysqli_stmt_execute($stmt_select_courses);
                                    mysqli_stmt_bind_result($stmt_select_courses, $recommendedCourse);

                                    // Fetch the result
                                    if (mysqli_stmt_fetch($stmt_select_courses)) {
                                        // Continue with the rest of your code...
                                        echo "<p>{$messages[$percent1]} <br> <span>$recommendedCourse</span></p>";
                                    } else {
                                        // Handle the case where no results are found
                                        echo "No recommended course found.";
                                    }

                                    mysqli_stmt_close($stmt_select_courses);
                                } else {
                                    die("Database query failed: " . mysqli_error($con));
                                }
                            }
                            ?>

                    </section>

            </div>
            <div class="card__sub-result--description">
                <div class="description__user-heading">
                  <?php
// Initialize variables for user data
$fname = $lname = $email = $lrn = $strand_track = '';

// Assuming the user_id is passed via $_GET['user_id']
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

    // Prepare the SQL statement to retrieve user data along with refid
    $sql = "SELECT fname, lname, email, lrn, strand_track, refid FROM user WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        // Bind parameters and execute query
        mysqli_stmt_bind_param($stmt, 's', $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            // User found, bind result variables
            mysqli_stmt_bind_result($stmt, $fname, $lname, $email, $lrn, $strand_track, $refid);
            mysqli_stmt_fetch($stmt);

            // Display the user's information including refid
            echo "<div class=\"user-fname\"><span>Name:&nbsp;</span>$fname $lname</div>";
            echo "<div class=\"user-email\"><span>Email:&nbsp;</span>$email</div>";
            echo "<div class=\"user-lrn\"><span>LRN:&nbsp;</span>$lrn</div>";
            echo "<div class=\"user-strand-selected\"><span>Strand:&nbsp;</span>$strand_track</div>";
            echo "<div class=\"user-refid\"><span>Ref ID:&nbsp;</span>$refid</div>"; // Display refid

            // Set the desired timezone
            date_default_timezone_set("Asia/Manila");

            // Get the current date in "Y-m-d" format
            $date = date("Y-m-d");

            // Display the formatted date
            echo "<div class=\"user-date-of-assessment\"><span>Date of Assessment:&nbsp;</span>$date</div>";

            // Check if the user's LRN and email match in the "results" table for today's date
            $checkSql = "SELECT * FROM results WHERE lrn = ? AND email = ? AND date = ?";
            $checkStmt = mysqli_prepare($con, $checkSql);

            if ($checkStmt) {
                mysqli_stmt_bind_param($checkStmt, 'sss', $lrn, $email, $date);
                mysqli_stmt_execute($checkStmt);
                mysqli_stmt_store_result($checkStmt);

                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                    // LRN and email match for the user and date, perform an UPDATE query
                    $updateSql = "UPDATE results SET refid = ? WHERE lrn = ? AND email = ? AND date = ?";
                    $updateStmt = mysqli_prepare($con, $updateSql);

                    if ($updateStmt) {
                        mysqli_stmt_bind_param($updateStmt, 'ssss', $refid, $lrn, $email, $date);
                        mysqli_stmt_execute($updateStmt);
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                } else {
                    // Generate a random result ID
                    $resultId = mt_rand(10000000, 99999999);

                    // LRN and email don't match for the user and date, perform an INSERT query
                    $insertSql = "INSERT INTO results (result_id, user_id, fname, lname, email, lrn, strand_track, refid, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $insertStmt = mysqli_prepare($con, $insertSql);

                    if ($insertStmt) {
                        mysqli_stmt_bind_param($insertStmt, 'sssssssss', $resultId, $user_id, $fname, $lname, $email, $lrn, $strand_track, $refid, $date);
                        mysqli_stmt_execute($insertStmt);
                    } else {
                        echo "Error inserting record: " . mysqli_error($con);
                    }
                }
            } else {
                echo "Error in check statement: " . mysqli_error($con);
            }

            mysqli_stmt_close($checkStmt);
        } else {
            echo "No user found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in statement: " . mysqli_error($con);
    }
}
?>


                </div>
            <?php
                // Assuming the user_id is passed via $_GET['user_id']
                if (isset($_GET['user_id'])) {
                    $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter
                    
                    // Prepare the SQL statement to retrieve recommended courses and percentiles
                    $selectCoursesSql = "SELECT course2, percent2, course3, percent3, course4, percent4, course5, percent5 FROM recommended_courses WHERE user_id = ?";
                    $stmt_select_courses = mysqli_prepare($con, $selectCoursesSql);

                    if ($stmt_select_courses) {
                        mysqli_stmt_bind_param($stmt_select_courses, 's', $user_id);
                        mysqli_stmt_execute($stmt_select_courses);
                        mysqli_stmt_bind_result($stmt_select_courses, $course2, $percent2, $course3, $percent3, $course4, $percent4, $course5, $percent5);

                        // Display the recommended courses
                        echo "<ul class='list-wrapper'>";

                        // Fetch the results
                        if (mysqli_stmt_fetch($stmt_select_courses)) {
                            $courses = array(
                                array('course' => $course2, 'percent' => $percent2),
                                array('course' => $course3, 'percent' => $percent3),
                                array('course' => $course4, 'percent' => $percent4),
                                array('course' => $course5, 'percent' => $percent5)
                            );

                            foreach ($courses as $courseData) {
                                $course = $courseData['course'];
                                $percent = $courseData['percent'];

                                // Check if the percent value is not 0% before displaying
                                if ($percent != 0) {
                                    echo "<li class='item-wrapper'>";
                                    echo "<span>$course</span>";
                                    echo "<span style='border: 1px solid rgba(42, 43, 43, 0.386); border-radius: .5rem; padding: .5rem; background-color: hsl(283, 39%, 95%); color: hsl(283, 34%, 40%);'>$percent%</span>";
                                    echo "</li>";
                                }
                            }
                        } else {
                            // Handle the case where no results are found
                            echo "<li>No recommended courses found.</li>";
                        }

                        echo "</ul>";

                        mysqli_stmt_close($stmt_select_courses);
                    } else {
                        die("Database query failed: " . mysqli_error($con));
                    }
                }
                ?>
                <div class="result-button-wrapper">
                    <button type="button" onclick="showBasis()">Details</button>
                    <button type="button" class="button-controls" onclick="showRetake()">Retake</button>
                </div>                      
            </div>
        </div>                        
    </main>
   
    <!-- SCRIPT -->
    <script>
        function showBasis(){
            window.location.href = 'basis.php?user_id=<?php echo $user_id; ?>';

        }
    </script>
   <script>
    <?php
    $userStrand = '';

    // Ensure that the user_id is provided via $_GET['user_id']
    if (isset($_GET['user_id'])) {
        $userId = $_GET['user_id']; // Fetch user_id from the URL parameter

        // Retrieve the user's strand from the user table based on $userId
        $selectStrandSql = "SELECT strand_track FROM user WHERE user_id = ?";
        $stmt_select_strand = mysqli_prepare($con, $selectStrandSql);

        if ($stmt_select_strand) {
            mysqli_stmt_bind_param($stmt_select_strand, 's', $userId);
            mysqli_stmt_execute($stmt_select_strand);
            mysqli_stmt_bind_result($stmt_select_strand, $userStrand);

            mysqli_stmt_fetch($stmt_select_strand);
            mysqli_stmt_close($stmt_select_strand);
        }
    }
    ?>

    function showRetake() {
        var userStrand = '<?php echo $userStrand; ?>';

        // Perform necessary checks or actions based on $userStrand obtained from $_GET['user_id']
        if (userStrand === 'ABM') {
            retakeUrl = 'assessment-page-abm.php?user_id=<?php echo $user_id; ?>';
  // Change to the actual URL for Strand1
        } else if (userStrand === 'STEM') {
            retakeUrl = 'assessment-page-stem.php?user_id=<?php echo $user_id; ?>';
 // Change to the actual URL for Strand2
        } else if (userStrand === 'HUMSS') {
            retakeUrl = 'assessment-page-humss.php?user_id=<?php echo $user_id; ?>';
  // Change to the actual URL for Strand3
        }

        localStorage.clear();
        window.location.href = retakeUrl;
    }
</script>

   <script>
    function confirmEndProgress() {
        Swal.fire({
            title: 'Congrats!',
            text: 'You have successfully completed the assessment. Please take note of your Reference ID: <?php echo $refid; ?> Thank you for using our service!',
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
    <script>
        var loader = document.getElementById("loader");
            window.addEventListener("load", function (){
                setTimeout(() => {
                    loader.style.display = "none";
                }, 1000);                  
            });
	</script>
    
</body>
</html>