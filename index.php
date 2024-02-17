<?php
session_start();
include("connection.php");

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $lrn = $_POST['lrn'];

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($lrn)) {
        // Check if the email contains "@feapitsat.com"
        if (strpos($email, '@feapitsat.com') === false) {
            // Set an error message for invalid email domain
            $errorMessage = "Invalid Email.";
        } else {
            // Sanitize user input
            $fname = mysqli_real_escape_string($con, $fname);
            $lname = mysqli_real_escape_string($con, $lname);
            $email = mysqli_real_escape_string($con, $email);
            $lrn = mysqli_real_escape_string($con, $lrn);

            // Generate unique IDs
            $user_id = mt_rand(10000000, 99999999);
            $refid = mt_rand(10000000, 99999999);

            // Check if the LRN exists in the database table
            $checkQuery = "SELECT * FROM lrn WHERE student_lrn = '$lrn'";
            $result = mysqli_query($con, $checkQuery);

            if (mysqli_num_rows($result) > 0) {
                // LRN found in the database
                $query = "INSERT INTO user (user_id, fname, lname, email, lrn, status, refid) VALUES ('$user_id', '$fname', '$lname', '$email', '$lrn', 'accepted', '$refid')";

                if (mysqli_query($con, $query)) {
                    // Redirect to user-strand-selection.php with user_id as a GET parameter
                    header("location: user-strand-selection.php?user_id=$user_id");
                    exit();
                } else {
                    // Set an error message if the query fails
                    $errorMessage = "Error: " . mysqli_error($con);
                }
            } else {
                // LRN not found in the database
                $query = "INSERT INTO user (user_id, fname, lname, email, lrn, refid) VALUES ('$user_id', '$fname', '$lname', '$email', '$lrn', '$refid')";
                if (mysqli_query($con, $query)) {
                    header("location: user-request.php?user_id=$user_id");
                    exit();
                } else {
                    // Set an error message if the query fails
                    $errorMessage = "Error: " . mysqli_error($con);
                }
            }
        }
    } else {
        // Set an error message for incomplete form fields
        $errorMessage = "Please fill in all the inputs before submitting.";
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
    <meta property="og:title" content="FEACORE">
    <meta property="og:description" content="Path to your future!">
    <meta property="og:url" content="https://feacore.online/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://feacore.online/assets/logo/fea-logo.png">

    <title>FEAPITSAT - CORE</title>

    <!-- Links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">

    <!-- CSS / JS link -->
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/forms-buttons/forms-buttons-styles.css?v=<?php echo time(); ?>">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        body{
            overflow-x: hidden;
        }
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 700,
            'GRAD' 0,
            'opsz' 24
        }
    </style>
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
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="FEAPITSAT" width="100">
            </a>
            <ul>
                <li><a onclick="scrollToSection('home')" style="color: hsl(208, 99%, 36%);">Home</a></li>
                <li><a onclick="scrollToSection('about')">About</a></li>
                <li><a onclick="scrollToSection('contact')">Contact</a></li>
                <button type="button" class="nav-button" onclick="courseRedirection()">Courses</button>
            </ul>
            <i class='bx bx-menu' id="bxMenu" onclick="funcShow()"></i>
            <i class='bx bx-x' id="bxX" onclick="funcHide()"></i>
        </nav>
    </header>
    <!-- Side Nav -->
    <aside class="side-nav" id="sideNav">
        <div class="side-navigation" id="sideNavRight">
            <div class="hr-divider"></div>
                <ul>
                    <li><a onclick="scrollToSection('home')">Home</a></li>
                    <div class="hr-divider side-hid"></div>
                    <li><a onclick="scrollToSection('about')">About</a></li>
                    <div class="hr-divider side-hid"></div>
                    <li><a onclick="scrollToSection('contact')">Contact</a></li>
                    <div class="hr-divider side-hid"></div>
                    <li><a href="user-course-list.php">Courses</a></li>
                </ul>
        </div>
    </aside>
    <!-- Main content -->
    <main>
        <div class="main-content">
            <h1>FUTURE AWAITS YOU</h1><br>
            <p>Get college-ready with personalized course recommendations for a <br> remarkable journey towards a brighter future
            </p>
            <div class="main-content__button-wrapper">
                <button type="button" class="button-controls get-stared-btn" id="openButton">GET STARTED</button>
                <button type="button" class="button-controls ref-num-btn" onclick="scrollToSection('refNum')">REFERENCE NUMBER</button>
            </div>
        </div>
    </main>
    <dialog class="modal" id="modal">
            <form method="post" class="form-controls" id="modalForm" onsubmit="return validateForm()">
            <span class="material-symbols-outlined card__close-modal" id="closeButton">close</span>
                <h1>Get Started</h1>
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" placeholder="First Name: " maxlength="16" autocomplete="off" required>
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname" placeholder="last Name: "  maxlength="16" autocomplete="off" required>
            <label for="email">Email: </label>
            <div id="error-msg" style="color: red;"></div>

            <input type="email" name="email" id="email" placeholder="username@feapitsat.com: " autocomplete="off"required>
            <label for="lrn">Lrn: </label>
            <input type="number" name="lrn" id="lrn" placeholder="Lrn number: "  required>
    <button type="submit" class="button-controls card__form-btn" id="modal-btn">Submit</button>
        </form>
    </dialog>
    <!-- About us section -->
    <section class="about-section" id="about">
        <div class="about-section__content-container">
            <article class="content-container__h2-p">
                <h2>What is Course Recommender?</h2>
                <p> This web-based system is a course recommendation platform that employs two types of assessments: Interest and Academic.
                    The Interest assessment gauges users' personal preferences and passions to suggest courses aligned with their interests. 
                    Simultaneously, the Academic assessment analyzes users' strengths and weaknesses in various academic subjects, tailoring recommendations based on their academic capabilities and career goals. 
                    <br><br>
                    This system ensures a holistic approach, providing users with well-rounded course suggestions that consider both personal interests and academic aptitude. 
                    The user-friendly interface streamlines the assessment process, making it easy for users to navigate and receive targeted recommendations. 
                    The goal is to empower users to make informed decisions about their educational paths, fostering a successful and satisfying academic journey.</p>
            </article>
            <div class="content-container__images-description">
                <article class="content-container__h3-p">
                    <h3>Why should you use it?</h3>
                    <p>The Course Recommendation system offers several compelling reasons for its use:</p>
                        <div class="hr-divider"></div>
                        <ul class="content-container__list-items">
                            <li>Personalized Guidance: The system employs a dual assessment approach, considering both user interests and academic strengths. This personalized guidance ensures that course recommendations align not only with academic capabilities but also with individual passions, fostering a more fulfilling educational experience.</li>
                            <br>
                            <li>The system provides users with informed and data-driven course recommendations. This minimizes the likelihood of making uninformed decisions about educational paths, helping users choose courses that align with their strengths and aspirations.</li>
                            <br>
                            <li>Holistic Approach: The incorporation of both Interest and Academic assessments ensures a holistic approach to course recommendations. This comprehensive evaluation takes into account not only academic capabilities but also personal interests, addressing the multifaceted nature of educational and career choices.</li>
                            <br>
                        </ul>                     
                </article>
                <div class="content-container__img-wrapper">
                    <img src="assets/images/fea-about-img.jpg" alt="" width="350" onclick="window.open(this.src, '_blank');">
                </div>
            </div>
        </div>
    </section>
    <!-- Contact us container -->
    <section class="contact-section" id="contact">
        <div class="contact-section__header">
            <h1>Contact Us</h1>
        </div>
            <div class="contact-section__message-container">
                <h1>Let's get in touch</h1>
                <p>We value your input! Share your thoughts or questions with us in the contact section, <br>
                and we'll make sure to take them into account. Looking forward to hearing from you!</p>       
                  <form method="POST" action="user-contact-us.php" class="form-controls" id="contactForm">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email:" required>
                    <div id="emailError" style="color: red; "></div> <!-- Error message placeholder -->
                    <label for="message">Message:</label>
                    <div class="textarea-container">
                      <textarea name="message" id="textarea" cols="50" rows="10" placeholder="Enter message..." required></textarea>
                      <span id="char-count">0/100</span>
                    </div>
                    <button type="submit" class="button-controls" id="submitBtn">Submit</button>
                    <div id="responseMessage" style="color: green; margin-top: 10px;"></div>
                </form>
            </div>

            <!-- LRN reference number -->
            <div class="result__lrn-search-input" id="refNum">
                <h2>Reference Number</h2>
                    <p>Access your history effortlessly! Utilize your unique reference number to review <br>
                        and revisit your past results and interactions with ease.</p>
                        <form method="post" action="user-reference-result.php" class="result__lrn-search-input--wrapper">
                            <input type="number" name="search_query" class="result__lrn-search-input-bar"
                                placeholder="Search by Reference Number" id="search-input-handler"
                                autocomplete="off" min="0" inputmode="numeric" pattern="[0-9]*"
                                title="Please enter a valid numeric value">
                            <i class='bx bx-search-alt-2 result__lrn-search-icon'></i>
                        </form>
                </div>
    </section>
    <!-- footer -->
    <footer>
        <div class="footer-links-row">
            <div class="footer-links-columns">
                <h3>Office <div class="underline-animation"><span></span></div></h3>
                <p>2nd Flr. JIM Bldg. <br>Daang Amaya 1, Tanza, Cavite, 4108</p>
                <a href="">feapitsatcollegesregistrar@gmail.com</a>
            </div>
            <div class="footer-links-columns">
                <h3>Links <div class="underline-animation"><span></span></div></h3>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="user-course-list.php">Courses</a></li>
            </div>
                <div class="footer-links-columns">
                    <h3>Socials <div class="underline-animation"><span></span></div></h3>
                    <div class="footer-social-icons">
                        <i class='bx bxl-facebook' onclick="location.href = 'https://www.facebook.com/feapitsatcollegesofficial';"></i>
                        <i class='bx bxl-youtube' onclick="location.href = 'https://www.youtube.com/@feapitsatcolleges6745';"></i>
                        <i class='bx bx-globe' onclick="location.href = 'https://www.feapitsat.com/';"></i>
                    </div>
                </div>
        </div>
        <hr>
        <h3 class="footer-copyrights">© All Rights Reserved - 2023 FEAPITSAT</h3>
    </footer>
    <!-- SCRIPT -->
    <script>
        document.getElementById('search-input-handler').addEventListener('input', function() {
            if (this.value.length > 8) {
                this.value = this.value.slice(0, 8);
            }
        });
    </script>
    <script>
        const modal = document.querySelector('#modal');
        const openModal = document.querySelector('#openButton');
        const closeModal = document.querySelector('#closeButton');

        openModal.addEventListener('click', () => {
            clearInputs(); // Clear inputs when opening modal
            modal.showModal();
        })

        closeModal.addEventListener('click', () => {
            modal.close();
        })

        function clearInputs() {
            // Clear input fields by setting their values to an empty string
            document.getElementById('fname').value = '';
            document.getElementById('lname').value = '';
            document.getElementById('email').value = '';
            document.getElementById('lrn').value = '';
            
            // Reset any error messages
            document.getElementById('error-msg').innerHTML = '';
        }
    </script>
    <script>
        // Add event listener to restrict input to 12 digits
        document.getElementById("lrn").addEventListener("input", function() {
            var value = this.value;
            // Remove any non-digit characters
            var newValue = value.replace(/\D/g, '');
            // Limit the input to 12 digits
            newValue = newValue.slice(0, 12);
            // Update the input value
            this.value = newValue;
        });

        // Add event listener to validate input exactly 12 digits before form submission
        document.getElementById("modalForm").addEventListener("submit", function(event) {
            var lrnValue = document.getElementById("lrn").value;
            // If the LRN input is not exactly 12 digits, prevent form submission
            if (lrnValue.length !== 12) {
                event.preventDefault();
                alert("Please enter exactly 12 digits for the LRN.");
            }
        });
    </script>  
    <!-- Text area string count -->
    <script>
        const messageTextarea = document.getElementById("textarea");
        const charCount = document.getElementById("char-count");

        messageTextarea.addEventListener("input", function() {
            const messageLength = messageTextarea.value.length;
            charCount.textContent = messageLength + "/100";

            if (messageLength > 100) {
                messageTextarea.value = messageTextarea.value.slice(0, 100);
                charCount.textContent = "100/100";
            }
        });
    </script>
    <!-- Loader -->
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
        function validateForm() {
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var email = document.getElementById('email').value;
            var lrn = document.getElementById('lrn').value;
            var errorMsg = document.getElementById('error-msg');

            // Check if any field is empty
            if (fname === '' || lname === '' || email === '' || lrn === '') {
                errorMsg.innerHTML = "Please fill in all the inputs before submitting.";
                return false;
            }

            // Check if the email contains "@feapitsat.com"
            if (email.indexOf('@feapitsat.com') === -1) {
                errorMsg.innerHTML = "Invalid Email";
                return false;
            }

            // Reset error message if no errors
            errorMsg.innerHTML = '';
            return true;
        }
    </script>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#contactForm').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var emailField = $('#email');
        var email = emailField.val().trim();
        var responseMessage = $('#responseMessage');
        var submit_button = document.getElementById("submitBtn");
        var emailError = $('#emailError');

        if (email && email.indexOf('@feapitsat.com') === -1) {
            // If email domain is not '@feapitsat.com', display error message under email input
            emailField.addClass('error');
            emailError.html('Invalid Email');
            responseMessage.html(''); // Clear previous response message
            return;
        } else {
            // Reset the error class and error message if it was previously set
            emailField.removeClass('error');
            emailError.html('');
        }

        // Proceed with form submission if email domain is valid
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
            if (response.includes('Invalid Email')) {
                emailField.addClass('error');
                emailError.html(response);
            } else {
                // Clear form inputs on successful submission
                form.trigger('reset');

                // Display success message for a specific duration (e.g., 5 seconds)
                // responseMessage.html('Your feedback has been submitted successfully.').css('margin-top', '10px');
                submit_button.innerHTML = "Your feeback has been submitted successfully";
                submit_button.style.backgroundColor = "hsl(145, 61%, 80%)";
                setTimeout(function() {
                    submit_button.innerHTML = "Submit";
                    submit_button.style.backgroundColor = "hsl(208, 100%, 34%)";
                }, 3000); // 5000 milliseconds (5 seconds) delay
            }
            },
            error: function(xhr, status, error) {
            // Handle the AJAX error here
            responseMessage.html('Error: ' + error);
            }
        });
        });
    });
    </script>
    <script src="script.js" async></script>
</body>
</html>
