<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Scores | About</title>

        <!-- JS links -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="script.js" async></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- Boxicons -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- CSS links -->
        <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
        <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Sriracha&display=swap" rel="stylesheet">
        <style>#readMore{display: none;}</style>
    </head>
    <body>
        <script>history.scrollRestoration = "manual"</script>

        <!-- Loader -->
        <div class="loader" id="loader">
		    <img src="assets/loader/Pulse-1s-104px.svg"/>
	    </div>
        <!-- End of Loader -->

        <header class="primary-wrapper" id="home">

            <!-- Default navigation -->
            <nav class="top-navigation">
                <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="Feafitsat" class="fea-logo">
                <ul class="top-ul">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="user-about.php" class="active">ABOUT</a></li>
                    <li><a href="user-course-list.php">COURSES</a></li>
                    <li><a href="user-contact-us.php">CONTACT</a></li>  
                </ul>
                <i class='bx bx-menu m-rst' id="bxMenu" onclick="funcShow()"></i>
                <i class='bx bx-x x-rst' id="bxX" onclick="funcHide()"></i>
            </nav>

            <!-- Side navigation for mobile view -->
            <div class="side-wrapper" id="sideWrapper">
                <div class="side-navigation" id="side-nav-right">
                    <div class="hr-divider side-hr"></div>
                        <ul class="side-link-card">
                            <li><a href="index.php">HOME</a></li>
                            <div class="hr-divider side-hr side-hid"></div>
                            <li><a href="user-about.php" class="active">ABOUT</a></li>
                            <div class="hr-divider side-hr side-hid"></div>
                            <li><a href="user-course-list.php">COURSES</a></li>
                            <div class="hr-divider side-hr side-hid"></div>
                            <li><a href="user-contact-us.php">CONTACT</a></li>
                        </ul>
                    <div class="hr-divider side-hr"></div>
                </div> 
            </div>
        </header>

            <!-- About us section -->
            <div class="container-wrapper-a">
                <div class="about-header-card">
                    <h1 class="about-header-title">ABOUT</h1>
                </div>
                <div class="about-us-important-section">
                    <!-- a -->
                    <div class="abt-info-srcs">
                       <h1 class="abt-info-title"><span style="color: lightgreen;">•</span> What is CORE?</h1>
                        <p><strong>CORE</strong> is an innovative course recommendation system designed to assist 
                            senior high school students in their transition to college.
                            By considering their strand, interests, and academic assessment results, 
                            CORE generates personalized course recommendations tailored to each 
                            student's unique profile. 
                        </p>
                    </div>
                    <!-- b -->
                    <div class="abt-info-srcs bg-contrast">
                        <h1 class="abt-info-title"><span style="color: lightgreen;">•</span> Why should you use it?</h1>
                        <p>Experience the power of CORE and gain a competitive edge in your college preparation. 
                            With personalized course recommendations tailored to your unique profile, 
                            SCORES saves you time and effort by presenting relevant options that align with your 
                            academic strengths, interests, and goals. 
                            By utilizing CORE, you can make 
                            informed choices, maximize your potential for academic success, and embark on a college 
                            journey that sets the foundation for a bright future.
                        </p>
                    </div>
                    <!-- c -->
                    <div class="abt-info-srcs">
                        <h1 class="abt-info-title"><span style="color: lightgreen;">•</span> We've got what you need!</h1>
                        <p>Welcome to CORE, your ultimate companion for college preparation. With our innovative system, we provide personalized course recommendations tailored to your unique profile. Discover the perfect courses that align with your academic strengths, interests, and strands. Our standout features include:
                        </p>
                    </div>

                    <!-- Info Cards -->
                    <div class="about-us-info-cards">
                        <!-- a -->
                        <div class="abt-card-a">
                            <div class="card-info-a">
                                <h4>Course Information</h4><i class='bx bxs-book-bookmark'></i>
                            </div>
                            <div class="hr-divider abt-hr"></div>
                            <div class="card-info-b">
                                <li>Course Search</li>
                                <div class="hr-divider abt-b"></div>
                                <li>Courses based on Strand or Track</li>
                                <div class="hr-divider abt-b"></div>
                                <li>Courses offered In Universities</li>
                            </div>
                        </div>
                        <!-- b -->
                        <div class="abt-card-a">
                            <div class="card-info-a">
                                <h4>Personalized Recommendations</h4><i class='bx bxs-check-shield'></i>
                            </div>
                            <div class="hr-divider abt-hr"></div>
                            <div class="card-info-b">
                                <li>Academic-Based Assessments</li>
                                <div class="hr-divider abt-b"></div>
                                <li>Interest-Based Assessments</li>
                                <div class="hr-divider abt-b"></div>
                                <li>Strand-Based Courses</li>
                            </div>
                        </div>
                        <!-- c -->
                        <div class="abt-card-a">
                            <div class="card-info-a">
                                <h4>Local University Mapping</h4><i class='bx bxs-star'></i>
                            </div>
                            <div class="hr-divider abt-hr"></div>
                            <div class="card-info-b">
                                <li>Assessment-Based University Suggestions</li>
                                <div class="hr-divider abt-b"></div>
                                <li>Detailed University Information</li>
                                <div class="hr-divider abt-b"></div>
                                <li>University Logo Representation</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer-wrapper">
                <div class="hr-divider footer-hr"></div>
                <div class="footer-info">
                    <span>S.C.O.R.E.S</span>
                    <span>All Rights Reserved 2023</span>
                </div>
            </footer>

        <script>
            var loader = document.getElementById("loader");

            window.addEventListener("load", function (){

                setTimeout(() => {
                    loader.style.display = "none";
                }, 1000);                  
            });
	    </script>

        <!-- <script>
            $(window).resize( function() {
            window.location.href = window.location.href;

            });
        </script> -->
    </body>
</html>