<?php
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
    <title>ABM - Assessment</title>

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
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="FEAPITSAT" width="100" onclick="confirmEndProgress()">
            </a>
        </nav>
    </header>
    <!-- Content wrapper / assessment page -->
    <section class="assessment-section">
        <div class="min-width__section">
            <div class="section__headings">
                <h1>Assessment</h1>
                <h4>Accountancy Business, and Management</h4>
                    <h3 id="assessmentCategory">
                        <i class='bx bxs-right-arrow' style="color: limegreen;"></i>&nbsp;&nbsp;Interest Questions:
                        <?php 
                        include 'connection.php';
                        $sql_interest = "SELECT COUNT(*) as total_interest_questions FROM question_abm_int WHERE qtype = 'interest'";
                        $result = mysqli_query($con, $sql_interest);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $total_interest_questions = $row['total_interest_questions'];
                            echo "<strong>" . $total_interest_questions . "</strong> <strong>items</strong>"; // Display the total interest questions and "items" in bold
                        } else {
                            // Handle the case when the query fails
                            echo "<strong>0</strong> <strong>items</strong>"; // Display 0 and "items" in bold if query fails
                        }
                        ?>
                    </h3>
            </div>
            <div class="hr-divider" role="separator"></div>
                <!-- Assessment C0ntents -->
                <!-- PHP -->
                <?php
                    include("connection.php");
                    session_start();

                    // Assuming the user_id is passed via $_GET['user_id']
                    if (isset($_GET['user_id'])) {
                        $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

                        // Query to retrieve questions from the database for 'interest' and 'academic' categories
                        $sql_interest = "SELECT question_text FROM question_abm_int WHERE qtype = 'interest'";
                        $result_interest = mysqli_query($con, $sql_interest);

                        if (!$result_interest) {
                            die("Database query failed: " . mysqli_error($con));
                        }

                        $questions_interest = [];
                        while ($row = mysqli_fetch_assoc($result_interest)) {
                            $questions_interest[] = $row['question_text'];
                        }

                        // Shuffle the arrays containing questions
                        shuffle($questions_interest);

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Assuming you have an array of user responses to save
                            $user_responses = $_POST['responses'];

                            // Replace "YES" with 1 and "NO" with 0 in the user responses
                            foreach ($user_responses as $question => $response) {
                                $user_responses[$question] = ($response == 'YES') ? 1 : 0;
                            }

                            // Check if all responses are "NO"
                            if (array_sum($user_responses) === 0) {
                                // Display SweetAlert
                            echo "<script>
                                    Swal.fire({
                                        title: 'Warning',
                                        text: 'Please consider reading Interest questions carefully to continue in Academic Questions',
                                        icon: 'warning',
                                        confirmButtonText: 'OK'
                                    }).then(function() {
                                        localStorage.clear();
                                        window.location.href = 'assessment-page-abm.php?user_id=" . $user_id . "';
                                    });
                                </script>";


                            } else {
                                // Now, let's query the database to get assigned courses for "YES" responses
                                $assigned_courses = [];
                                $stmt = $con->prepare("SELECT assigned_course FROM question_abm_int WHERE question_text = ?");
                                $stmt->bind_param("s", $question_text);

                                foreach ($user_responses as $question => $response) {
                                    if ($response == 1) {
                                        $question_text = $question;
                                        if ($stmt->execute()) {
                                            $result_assigned_course = $stmt->get_result();

                                            if ($result_assigned_course->num_rows > 0) {
                                                $row = $result_assigned_course->fetch_assoc();
                                                $assigned_courses[] = $row['assigned_course'];
                                            }
                                        } else {
                                            die("Database query failed: " . $stmt->error);
                                        }
                                    }
                                }

                                $stmt->close();

                                // Group and count the assigned courses
                                $grouped_assigned_courses = array_count_values($assigned_courses);

                                // Sort the grouped assigned courses based on "YES" counts in descending order
                                arsort($grouped_assigned_courses);

                                // Get the top 5 grouped assigned courses
                                $top5_grouped_assigned_courses = array_slice($grouped_assigned_courses, 0, 5);

                                // Insert the top 5 grouped assigned courses and their YES counts into the database
                                $rank = 1;

                                foreach ($top5_grouped_assigned_courses as $course => $count) {
                                    $courseColumnName = "top" . $rank;
                                    $countColumnName = "yescount" . $rank;
                                    $sql = "INSERT INTO topcourse_interest (user_id, $courseColumnName, $countColumnName)
                                            VALUES ('$user_id', '$course', '$count')
                                            ON DUPLICATE KEY UPDATE $courseColumnName = VALUES($courseColumnName), $countColumnName = VALUES($countColumnName)";
                                    mysqli_query($con, $sql);
                                    $rank++;
                                }
                                $_SESSION['grouped_assigned_courses'] = $grouped_assigned_courses;

                                header("Location: assessment-page-abm-acad.php?user_id=" . $user_id);
                                exit();
                            }
                        }
                    }
                ?>
           
                <div class="section__assessment-content">
                    <form method="post"  onsubmit="return validateForm()">
                        <!-- Page A (with header) -->
                        <div class="assessment-content__page-a">
                            <div class="content__list">
                                <h3>Choose between Yes or No</h3>
                                    <?php
                                    // Generate radio buttons for interest questions
                                    foreach ($questions_interest as $index => $question) {
                                        // Use a unique identifier for the question
                                        $questionId = 'question_' . $index;

                                        // Check if a response for this question is stored in local storage
                                        $questionKeyword = $questions_interest[$index];
                                        $savedResponse = isset($formState[$questionKeyword]) ? $formState[$questionKeyword] : '';

                                        echo '<div class="hr-divider"></div>';
                                        echo '<label>' . ($index + 1) . '. ' . $question . '</label>';
                                        echo '<div class="radio-wrapper">';
                                        echo '<label class="radio-flex">';
                                        echo '<input type="radio" name="responses[' . $questionKeyword . ']" value="YES" ' . ($savedResponse === 'YES' ? 'checked' : '') . '> Yes';
                                        echo '</label>';
                                        echo '<label class="radio-flex">';
                                        echo '<input type="radio" name="responses[' . $questionKeyword . ']" value="NO" ' . ($savedResponse === 'NO' ? 'checked' : '') . '> No';
                                        echo '</label>';
                                        echo '</div>';
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
        <i class='bx bxs-chevrons-up' onclick="scrTop()" id="bottom"></i>
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
    <!-- Add this script in your HTML document -->
    <script>
        // Define the formState variable
        let formState = {};

        // Function to restore the form state from local storage
        function restoreFormState() {
            const savedState = localStorage.getItem('formState');
            if (savedState) {
                const responses = JSON.parse(savedState);
                Object.keys(responses).forEach((name) => {
                    Object.keys(responses[name]).forEach((value) => {
                        const radio = document.querySelector(`input[type="radio"][name="${name}"][value="${value}"]`);
                        if (radio) {
                            radio.checked = responses[name][value] === 'YES' || responses[name][value] === 'NO';
                        }
                    });
                });

                // Assign the restored responses to the formState variable
                formState = responses;
            }
        }

        // Function to save the form state to local storage
        function saveFormState() {
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
            localStorage.setItem('formState', JSON.stringify(responses));
        }

        // Function to restore the form state from local storage
        function restoreFormState() {
            const savedState = localStorage.getItem('formState');
            if (savedState) {
            const responses = JSON.parse(savedState);
            Object.keys(responses).forEach((name) => {
                Object.keys(responses[name]).forEach((value) => {
                const radio = document.querySelector(`input[type="radio"][name="${name}"][value="${value}"]`);
                if (radio) {
                radio.checked = responses[name][value] === 'YES' || responses[name][value] === 'NO';
                }
                });
            });
            }
        }

        // Add event listeners to the radio buttons and "Next" button
        document.addEventListener('DOMContentLoaded', function() {
            // Restore the form state when the page loads
            restoreFormState();

            // Add event listeners to the radio buttons
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach((radio) => {
            radio.addEventListener('change', saveFormState);
            });

            // Add an event listener to the "Next" button to save the form state
            const nextButton = document.querySelector('.button-controls');
            nextButton.addEventListener('click', saveFormState);
        });
    </script>
    <script>
        let showingAlert = false;
        function validateForm() {
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            let isFormValid = true;
            let unansweredQuestionContainer = null;
            let scrolledToUnanswered = false;
            let preventSubmission = false;
            
            radioButtons.forEach((radio) => {
                const name = radio.getAttribute('name');

                // Check if the radio button is checked
                if (!document.querySelector(`input[type="radio"][name="${name}"]:checked`)) {
                    isFormValid = false;
                    const questionContainer = radio.closest('.radio-wrapper');
                    questionContainer.style.outline = '2px solid hsla(353, 69%, 53%, 0.625)'; // Add a red outline to unanswered questions
                    questionContainer.style.borderRadius = '1rem';

                    if (!unansweredQuestionContainer) {
                        unansweredQuestionContainer = questionContainer;
                    }
                } else {
                    const questionContainer = radio.closest('.radio-wrapper');
                    questionContainer.style.outline = ''; // Remove outline if answered
                }
            });

            if (!isFormValid && unansweredQuestionContainer && !scrolledToUnanswered && !preventSubmission) {
                const focusUnansweredInput = () => {
                    const unansweredInput = unansweredQuestionContainer.querySelector('input[type="radio"]');
                    unansweredInput.focus();
                };

                const offset = unansweredQuestionContainer.getBoundingClientRect().top + window.scrollY - 100; 

                // Check if the form is already scrolled to the unanswered question before scrolling again
                const isAlreadyScrolled = offset >= window.scrollY && offset <= window.scrollY + window.innerHeight;

                if (!isAlreadyScrolled) {
                    window.scrollTo({
                        top: offset,
                        behavior: 'smooth'
                    });
                }

                scrolledToUnanswered = true;
                showingAlert = true;

                alert('Please answer all questions before submitting');
                setTimeout(() => {
                            showingAlert = false;
                        }, 0);

                focusUnansweredInput();
                preventSubmission = true; 

                return false; 
            }

            return isFormValid;
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


        // Add event listeners to radio buttons to remove red outline when answered
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', () => {
                const questionContainer = radio.closest('.radio-wrapper');
                questionContainer.style.outline = ''; // Remove outline when the radio button is answered
            });
        });
      
    </script>
</body>
</html>