<?php
include("connection.php");
session_start();
if (!isset($_GET['user_id'])) {
        header("location: index.php");
        exit();
    } else {
        $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

        // Query to retrieve the top 5 interested courses for the user in session
        $sql_top_courses = "SELECT top1, top2, top3, top4, top5 FROM topcourse_interest WHERE user_id = ?";
        $stmt = mysqli_prepare($con, $sql_top_courses);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result_top_courses = mysqli_stmt_get_result($stmt);

        if (!$result_top_courses) {
            die("Database query failed: " . mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($result_top_courses);

        $top_courses = array(
            $row['top1'],
            $row['top2'],
            $row['top3'],
            $row['top4'],
            $row['top5']
        );

        // Remove any null or empty values from the array
        $top_courses = array_filter($top_courses, function ($value) {
            return !empty($value);
        });

        // Check if there are any top courses for the user
        if (empty($top_courses)) {
            die("No top courses found for the user.");
        }

        // Assuming $top_courses is an array of course names
        $courseNames = $top_courses;

        // Prepare the SQL statement for academic questions
        $placeholders = implode(', ', array_fill(0, count($courseNames), '?'));
        $sql_academic = "SELECT question_text, a, b, c, d FROM question_humss_acad WHERE qtype = 'academic' AND assigned_course IN ($placeholders)";
        $stmt_academic = mysqli_prepare($con, $sql_academic);
        mysqli_stmt_bind_param($stmt_academic, str_repeat('s', count($courseNames)), ...$courseNames);
        mysqli_stmt_execute($stmt_academic);
        $result_academic = mysqli_stmt_get_result($stmt_academic);

        if (!$result_academic) {
            die("Database query failed: " . mysqli_error($con));
        }

        $questions_academic = [];
        while ($row = mysqli_fetch_assoc($result_academic)) {
            $questions_academic[] = $row;
        }

        // Shuffle the arrays containing academic questions
        shuffle($questions_academic);

        // Check if the user has submitted the assessment form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have an array of user responses to save
            $user_responses = $_POST['responses'];


        // Initialize an array to store the correct answers for each assigned course
        $correctAnswersByCourse = [];
        $totalQuestionsByCourse = [];

        // Initialize the database query
        $sql_academic = "SELECT question_text, a, b, c, d, assigned_course, correct_answer FROM question_humss_acad WHERE qtype = 'academic' AND assigned_course IN ($placeholders)";
        $stmt_academic = mysqli_prepare($con, $sql_academic);
        mysqli_stmt_bind_param($stmt_academic, str_repeat('s', count($courseNames)), ...$courseNames);
        mysqli_stmt_execute($stmt_academic);
        $result_academic = mysqli_stmt_get_result($stmt_academic);

        if (!$result_academic) {
            die("Database query failed: " . mysqli_error($con));
        }

        while ($row = mysqli_fetch_assoc($result_academic)) {
            $question_text = $row['question_text'];
            $correct_answer = $row['correct_answer'];
            $assigned_course = $row['assigned_course'];

            // Check if the question is in the user's responses
            if (isset($user_responses[$question_text])) {
                // Compare the user's response to the correct answer
                $response = $user_responses[$question_text];
                if ($response == $correct_answer) {
                    // Count this as a correct response (one point)
                    if (!isset($correctAnswersByCourse[$assigned_course])) {
                        $correctAnswersByCourse[$assigned_course] = 0;
                    }
                    $correctAnswersByCourse[$assigned_course]++;
                }

                // Count the total questions per assigned course
                if (!isset($totalQuestionsByCourse[$assigned_course])) {
                    $totalQuestionsByCourse[$assigned_course] = 0;
                }
                $totalQuestionsByCourse[$assigned_course]++;
            }
        }

        // Calculate and store the percentiles for each course
        $correctAnswersByCourseText = [];

        foreach ($correctAnswersByCourse as $course => $correctCount) {
            if (isset($totalQuestionsByCourse[$course])) {
                $totalQuestions = $totalQuestionsByCourse[$course];
                $percentile = ($correctCount / $totalQuestions) * 100;
                $correctAnswersByCourseText[$course] = round($percentile); // Store the percentile directly
            } else {
                $correctAnswersByCourseText[$course] = 'N/A';
            }
        }

        // Store the raw counts and percentiles in the session
        $_SESSION['rawCountsByCourse'] = $correctAnswersByCourse;
        $_SESSION['percentilesByCourse'] = $correctAnswersByCourseText;

        // Sort the courses based on the number of correct answers (highest to lowest)
        arsort($correctAnswersByCourse);

        // Initialize the recommended courses array
        $recommendedCourses = [];

        // Generate the recommended_courses array
        $i = 1;
        foreach ($correctAnswersByCourse as $course => $correctCount) {
            $recommendedCourses["course$i"] = $course;
            $recommendedCourses["count$i"] = $correctCount;
            $recommendedCourses["percent$i"] = $correctAnswersByCourseText[$course];

            if ($i === 5) {
                break; // We only need the top 5 courses
            }

            $i++;
        }

        // Initialize the values array
        $values = [$_GET['user_id']];

        // Create a string for the param_types
        $param_types = 's'; // user_id is always a string

        // Create a reference array for bind_param
        $bind_params = [$param_types];

        for ($j = 1; $j <= 5; $j++) {
                $recommendedCourses["course$j"] = isset($recommendedCourses["course$j"]) ? $recommendedCourses["course$j"] : '';
                $recommendedCourses["count$j"] = isset($recommendedCourses["count$j"]) ? $recommendedCourses["count$j"] : 0;
                $recommendedCourses["percent$j"] = isset($recommendedCourses["percent$j"]) ? $recommendedCourses["percent$j"] : 0;

                $values[] = $recommendedCourses["course$j"];
                $values[] = $recommendedCourses["count$j"];
                $values[] = $recommendedCourses["percent$j"];
                // Add type information to the param_types
                $param_types .= 'sii'; // course (string), count (integer), percent (integer)

                // Add references to the bind_params array
                $bind_params[] = &$values[count($values) - 3]; // Course (string)
                $bind_params[] = &$values[count($values) - 2]; // Count (integer)
                $bind_params[] = &$values[count($values) - 1]; // Percent (integer)
            }

            // Now, you can insert or update the data in the recommended_courses table
            $sql_insert_update = "INSERT INTO recommended_courses (user_id, course1, count1, percent1, course2, count2, percent2, course3, count3, percent3, course4, count4, percent4, course5, count5, percent5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE course1 = VALUES(course1), count1 = VALUES(count1), percent1 = VALUES(percent1), course2 = VALUES(course2), count2 = VALUES(count2), percent2 = VALUES(percent2), course3 = VALUES(course3), count3 = VALUES(count3), percent3 = VALUES(percent3), course4 = VALUES(course4), count4 = VALUES(count4), percent4 = VALUES(percent4), course5 = VALUES(course5), count5 = VALUES(count5), percent5 = VALUES(percent5)";
            $stmt_insert_update = mysqli_prepare($con, $sql_insert_update);

            if ($stmt_insert_update) {
                
                // Create an array to store the bind params
                $bind_params = array();

                // Build the placeholders for bind_param dynamically
                $placeholders = str_repeat('sii', 5) . str_repeat('sii', 5); // Add placeholders for percent values

                // Add user_id to the bind_params array
                $bind_params[] = &$_GET['user_id'];

                // Add references to the bind_params array
                for ($j = 1; $j <= 5; $j++) {
                    $bind_params[] = &$recommendedCourses["course$j"];
                    $bind_params[] = &$recommendedCourses["count$j"];
                    $bind_params[] = &$recommendedCourses["percent$j"];
                }

                // Now, you can insert or update the data in the recommended_courses table
                $sql_insert_update = "INSERT INTO recommended_courses (user_id, course1, count1, percent1, course2, count2, percent2, course3, count3, percent3, course4, count4, percent4, course5, count5, percent5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE course1 = VALUES(course1), count1 = VALUES(count1), percent1 = VALUES(percent1), course2 = VALUES(course2), count2 = VALUES(count2), percent2 = VALUES(percent2), course3 = VALUES(course3), count3 = VALUES(count3), percent3 = VALUES(percent3), course4 = VALUES(course4), count4 = VALUES(count4), percent4 = VALUES(percent4), course5 = VALUES(course5), count5 = VALUES(count5), percent5 = VALUES(percent5)";
                $stmt_insert_update = mysqli_prepare($con, $sql_insert_update);

                if ($stmt_insert_update) {
                    // Bind parameters using call_user_func_array
                    call_user_func_array('mysqli_stmt_bind_param', array_merge(array($stmt_insert_update, $param_types), $bind_params));

                    if (mysqli_stmt_execute($stmt_insert_update)) {
                        // Insert or update successful
                    } else {
                        die("Failed to insert or update recommended courses: " . mysqli_error($con));
                    }

                    mysqli_stmt_close($stmt_insert_update);
                } else {
                    die("Database query failed: " . mysqli_error($con));
                }

                    // Store the updated recommended courses in the session
                    $_SESSION['recommendedCourses'] = $recommendedCourses;

                    // Redirect the user to see.php
                    header("location: user-send-result.php?user_id=" . $user_id);
                    exit();
                }
        }
    }
?>

<!-- HTML DOCUMENT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUMSS - Assessment</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS links -->
    <link rel="stylesheet" href="css/assessment-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/forms-buttons/forms-buttons-styles.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">
    <link rel="stylesheet" href="css/pop-ups.css?v=<?php echo time(); ?>">

    <!-- JS links -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="script.js" async></script>

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
    <header id="top">
    <!-- Default navigation -->
        <nav class="top-navigation" id="topNav">
            <a class="restrict-hidden-logo">
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="FEAPITSAT" width="100">
            </a>
        </nav>
    </header>
    <!-- Content wrapper / assessment page -->
    <section class="assessment-section">
        <div class="min-width__section">
            <div class="section__headings">
                <h1>Assessment</h1>
                <h4>Humanities and Social Sciences</h4>
               <?php
                // Assuming $top_courses is an array of course names
                $courseNames = $top_courses;

                // Prepare the SQL statement for academic questions
                $placeholders = implode(', ', array_fill(0, count($courseNames), '?'));
                $sql_academic = "SELECT COUNT(*) as total_academic_questions FROM question_humss_acad WHERE qtype = 'academic' AND assigned_course IN ($placeholders)";
                $stmt_academic = mysqli_prepare($con, $sql_academic);
                mysqli_stmt_bind_param($stmt_academic, str_repeat('s', count($courseNames)), ...$courseNames);
                mysqli_stmt_execute($stmt_academic);
                $result_academic = mysqli_stmt_get_result($stmt_academic);

                if ($result_academic) {
                    $row = mysqli_fetch_assoc($result_academic);
                    $total_academic_questions = $row['total_academic_questions'];
                } else {
                    // Handle the case when the query fails
                    $total_academic_questions = 0;
                }
                ?>

                <h3 id="assessmentCategory">
                    <i class='bx bxs-right-arrow' style="color: limegreen;"></i>&nbsp;&nbsp;Academic Questions: 
                    <strong><?php echo $total_academic_questions; ?></strong> <strong>items</strong>
                </h3>
            </div>
            <div class="hr-divider" role="separator"></div>
                <!-- Assessment C0ntents -->           
                <div class="section__assessment-content">
                    <form method="post"  onsubmit="return validateForm()">
                        <!-- Page A (with header) -->
                        <div class="assessment-content__page-a">
                            <div class="content__list" id="questionSetA">
                                <h3>Multiple Choice</h3>
                                    <?php
                                        // Generate radio buttons for academic questions
                                        foreach ($questions_academic as $index => $question) {
                                            // Use a unique identifier for the question
                                            $questionId = 'question_acad_' . $index;

                                            // Check if a response for this academic question is stored in local storage
                                            $questionKeyword = $question['question_text'];
                                            $savedResponse = isset($formStateAcad[$questionKeyword]) ? $formStateAcad[$questionKeyword] : '';
                                            
                                            echo '<div class="hr-divider" role="separator"></div>';
                                            echo '<label role="label">' . ($index + 1) . '. ' . $question['question_text'] . '</label>';
                                            foreach (['a', 'b', 'c', 'd'] as $choice) {
                                                echo '<div class="radio-wrapper">';                        
                                                echo '<label class="radio-flex" role="radio">';
                                                echo '<input type="radio" name="responses[' . $questionKeyword . ']" value="' . $choice . '" ' . ($savedResponse === $choice ? 'checked' : '') . '> ' . $choice . '. ' . $question[$choice];
                                                echo '</label>';
                                                echo '</div>';
                                            }
                                        }
                                    ?>
                            </div>
                                 <div class="button-wrapper">
                                    <button type="submit" class="button button-controls" onmouseover="showTooltip('submitTooltip')" onmouseout="hideTooltip('submitTooltip')">
                                        Next
                                        <span id="submitTooltip" class="tooltip">Next Page</span>
                                    </button>

                                    <button type="button" class="button button-controls button-controls__button-cancel" onmouseover="showTooltip('cancelTooltip')" onmouseout="hideTooltip('cancelTooltip')" onclick="confirmEndProgress()">
                                        Cancel
                                        <span id="cancelTooltip" class="tooltip">Cancel Assessment</span>
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
        </div>
        <i class='bx bxs-chevrons-up' onclick="scrTop()"></i>
    </section>
    <script>
        function scrTop(){
            window.location.href = "#top";
        }
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
                    // Clear local storage before ending the session
                    localStorage.clear();
                    
                    // If the user clicks "Yes, end it!", navigate to the specified link
                    window.location.href = 'index-endhome.php?user_id=<?php echo $user_id; ?>';
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
    <!-- Add this JavaScript code after the form HTML -->
    <script>
        // Function to save the form state to local storage
        function saveFormStateAcad() {
            const responses = {};
            const radioButtons = document.querySelectorAll('input[type="radio"]');

            radioButtons.forEach((radio) => {
                const name = radio.getAttribute('name');
                const value = radio.checked ? radio.value : '';

                if (!responses[name]) {
                    responses[name] = {};
                }

                responses[name][radio.value] = value;
            });

            // Save the responses object to local storage as a JSON string
            localStorage.setItem('formStateAcad', JSON.stringify(responses));
        }

        // Function to restore the form state from local storage
        function restoreFormStateAcad() {
            const savedState = localStorage.getItem('formStateAcad');
            if (savedState) {
                const responses = JSON.parse(savedState);
                Object.keys(responses).forEach((name) => {
                    Object.keys(responses[name]).forEach((value) => {
                        const radio = document.querySelector(`input[type="radio"][name="${name}"][value="${value}"]`);
                        if (radio) {
                            radio.checked = responses[name][value] === 'a' || responses[name][value] === 'b' || responses[name][value] === 'c' || responses[name][value] === 'd';
                        }
                    });
                });
            }
        }

        // Add an event listener to the "Submit" button to validate the form
        document.addEventListener('DOMContentLoaded', function() {
            // Restore the form state when the page loads
            restoreFormStateAcad();

            const submitButton = document.querySelector('button[type="submit"]');
            submitButton.addEventListener('click', function(event) {
                if (!validateAcademicForm()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });

            // Add event listeners to the radio buttons
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach((radio) => {
                radio.addEventListener('change', saveFormStateAcad);
            });

            // Add an event listener to the "Next" button to save the form state
            const nextButton = document.querySelector('.button-controls');
            nextButton.addEventListener('click', saveFormStateAcad);
        });
    </script>
    <script>
       let showingAlert = false;

    function validateForm() {
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        let isFormValid = true;
        let unansweredQuestionContainer = null;

        radioButtons.forEach((radio) => {
            const name = radio.getAttribute('name');

            // Check if the radio button is checked
            if (!document.querySelector(`input[type="radio"][name="${name}"]:checked`)) {
                isFormValid = false;
                const questionContainer = radio.closest('.radio-wrapper');
                questionContainer.style.outline = '2px solid hsla(353, 69%, 53%, 0.625)'; // Add a red outline to unanswered questions
                questionContainer.style.borderRadius = "1rem";
                if (!unansweredQuestionContainer) {
                    unansweredQuestionContainer = questionContainer;
                }
            } else {
                const questionContainer = radio.closest('.radio-wrapper');
                questionContainer.style.outline = ''; // Remove outline if answered
            }
        });

        if (!isFormValid && !showingAlert) {
            alert('Please answer all questions before submitting');

            if (unansweredQuestionContainer) {
                const offset = unansweredQuestionContainer.getBoundingClientRect().top + window.scrollY - 100; // Adjusting scroll position to be 100px above the element
                window.scrollTo({
                    top: offset,
                    behavior: 'smooth'
                });
            }

            // Set the flag indicating the alert is being shown
            showingAlert = true;

            // Reset the flag after the alert is dismissed
            setTimeout(() => {
                showingAlert = false;
            }, 0);

            return false; // Prevent form submission if there are unanswered questions
        } else if (isFormValid && !showingAlert) {
            // If the form is valid and no other alert is currently shown, show SweetAlert with a loading spinner
            const loadingAlert = Swal.fire({
                title: 'Calculating Recommended Courses for you',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Set the flag indicating the loading alert is being shown
            showingAlert = true;

            // Reset the flag after the loading alert is dismissed
            loadingAlert.then(() => {
                showingAlert = false;
            });
        }
    }

            window.onfocus = function() {
            if (!showingAlert) {
                showingAlert = true;

                Swal.fire({
                    title: 'Warning!',
                    text: 'You are not allowed to do such action. Be careful next time.',
                    icon: 'warning',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false 
                    }).then(() => {
                        window.location.href = 'index-endhome.php?user_id=<?php echo $user_id; ?>';
                        localStorage.clear();
                    });
            }
        };
        window.onbeforeunload = function() {
        localStorage.clear();
        };



        // Add event listeners to radio buttons to remove red outline when answered and clear others in the same question
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', () => {
                const questionContainer = radio.closest('.radio-wrapper');
                const name = radio.getAttribute('name');
                questionContainer.style.outline = ''; // Remove outline when the radio button is answered

                // Clear outlines for other radio buttons in the same question
                const otherRadioButtons = document.querySelectorAll(`input[type="radio"][name="${name}"]:not(:checked)`);
                otherRadioButtons.forEach((otherRadio) => {
                    const otherQuestionContainer = otherRadio.closest('.radio-wrapper');
                    otherQuestionContainer.style.outline = '';
                });
            });
        });
    </script>
</body>
</html>