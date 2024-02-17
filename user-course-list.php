<!-- PHP -->
<?php
session_start();
include("connection.php");

// Database query function to fetch search results
function searchDatabase($query) {
   
    
    // Implement your database query logic here and return the results
    $sql = "SELECT * FROM courses WHERE course_name LIKE '%$query%'";
    
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Database query failed: " . mysqli_error($con));
    }

    return $result;
}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search_query = $_POST['search_query'];
        // Call the searchDatabase function to fetch results based on the user's input
        $search_results = searchDatabase($search_query);
    }
?>

<!-- HTML DOCUMENT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEA - Courses</title>

    <!-- links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS / JS link -->
    <link rel="stylesheet" href="css/course-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">
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
    <header id="home">
        <!-- Default navigation -->
        <nav class="top-navigation" id="topNav">
            <a href="index.php" class="restrict-hidden-logo">
              <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="CORE" width="100">
            </a>
            <ul>
                <li><a href="index.php" class="restrict-query-links">Home</a></li>
            </ul>
        </nav>
    <!-- Course lists | content-wrapper -->
    <section class="course-list-section"> 
        <div class="list__search-tool">
            <form action="user-course-search.php" method="POST">
                <h2>CORE</h2>
                <p>Effortlessly find the perfect courses with our Search Courses tab. 
                    <br>
                    Use the search bar to explore curated information and make informed decisions about your educational journey.</p>
                <div class="search-tool__container">
                    <!-- Input Search Bar -->
                    <input type="search" name="search_query" maxlength="200" placeholder="Search here..." id="search-input-handler" autocomplete="off">
                    <i class='bx bx-search-alt-2'></i>
                </div>
                <!-- Dropdown container for search results -->
                <div class="search-tool__dropdown-result" id="search-results-dropdown">
                    <ul id="search-results-list"></ul>
                </div>
            </form>
            <div class="search-tool__input-message" id="inputMessageNone">
                <em>Explore the possibilities! Type in the search bar above to discover relevant courses and unlock a world of educational opportunities. 
                    <br>
                    Nothing to see here until you start typing!</em>
            </div>
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
    <script type="text/javascript">
        // JavaScript code to handle autocomplete functionality
        const searchInput = document.getElementById("search-input-handler");
        const searchResultsDropdown = document.getElementById("search-results-dropdown");
        const searchResultsList = document.getElementById("search-results-list");
        const noMessage = document.getElementById("inputMessageNone");
            searchInput.addEventListener("input", function() {
                const searchQuery = this.value.trim();
                if (searchQuery === "") {
                    searchResultsDropdown.style.transform = "translateY(-1rem)";
                    noMessage.style.transform = "translateY(0)";

                        setTimeout(() => {
                            searchResultsDropdown.style.opacity = "0";
                            setTimeout(() => {
                                searchResultsDropdown.style.display = "none";
                                noMessage.style.display = "flex";
                            },80);                          
                        },20);
                    return;
                }
                    // Send an AJAX request to fetch search results from the server
                    $.ajax({
                        method: "POST",
                        url: "user-course-search.php", // Replace with the PHP script that performs the database search
                        data: { search_query: searchQuery },
                        success: function(response) {
                            // Update the dropdown with the search results
                            searchResultsList.innerHTML = response;
                            searchResultsDropdown.style.display = "block";
                            noMessage.style.display = "none";
                            
                                setTimeout(() => {
                                    searchResultsDropdown.style.opacity = "1";
                                    searchResultsDropdown.style.transform = "translateY(0)";
                                    noMessage.style.transform = "translateY(-1rem)";
                                },50);

                            // Attach a click event listener to each result item
                            const resultItems = searchResultsList.querySelectorAll("li");
                                resultItems.forEach(function(resultItem) {
                                resultItem.addEventListener("click", function() {
                                    // Extract the course ID or other unique identifier from the result item
                                    const courseId = resultItem.dataset.courseId; // Assuming you have a "data-course-id" attribute

                                    // Redirect to the course details page with the course ID
                                    // window.location.href = "user-course-details.php?course_id=" + courseId; // Replace with your URL
                                    window.open("user-course-details.php?course_id=" + courseId,'_blank');
                                    });
                                });
                        }
                    });
            });
        // Prevent Enter key from submitting the form
        searchInput.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
            }
        });
    </script>
    <script>
        var loader = document.getElementById("loader");
        window.addEventListener("load", function (){
            setTimeout(() => {
                loader.style.display = "none";
            }, 1000);                  
        });
    </script> 
    <script>
        function sideNavForCourses(){
            let tglNav = document.querySelector(".course-list-side-nav");
            tglNav.style.display = "block";
        }
    </script>
</body>
</html>