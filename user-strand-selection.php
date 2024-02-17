<?php
    session_start();
    include("connection.php");

    // Assuming the user_id is passed via $_GET['user_id']
   
 if (!isset($_GET['user_id'])) {
        header("location: index.php");
        exit();
    } else {
        $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the selected strand name from the form data and sanitize it
            $strand_track = mysqli_real_escape_string($con, $_POST['strand_track']);

            // Define the valid strand names
            $validstrand_tracks = array("ABM", "STEM", "HUMSS");

            // Check if the selected strand name is valid
            if (in_array($strand_track, $validstrand_tracks)) {
                // Start the transaction
                mysqli_begin_transaction($con);

                // Update the user table with the selected strand name
                $query = "UPDATE user SET strand_track = '$strand_track' WHERE user_id = '$user_id'";
                mysqli_query($con, $query);

                // Commit the transaction if everything is successful
                mysqli_commit($con);

                // Redirect based on the selected strand
                switch ($strand_track) {
                    case "ABM":
                        header("location: assessment-page-abm.php?user_id=$user_id");
                        exit();
                    case "STEM":
                        header("location: assessment-page-stem.php?user_id=$user_id");
                        exit();
                    case "HUMSS":
                        header("location: assessment-page-humss.php?user_id=$user_id");
                        exit();
                }
            } else {
                echo "Invalid strand name.";
            }
        }
    }
    include("presets/user-top-navigation.php");
?>

    <!-- Container wrapper / Strand selection page -->
    <div class="strand-select-section">
        <div class="strand-select__headings-container">
            <div class="headings-container__margin-top">
                <h1>
                    <?php
                        // Assuming the user_id is passed via $_GET['user_id']
                        if (isset($_GET['user_id'])) {
                            $user_id = $_GET['user_id']; // Fetch user_id from the URL parameter

                            include("connection.php");

                            $user_id = mysqli_real_escape_string($con, $_GET['user_id']);

                            // Retrieve the user's first name from the database
                            $query = "SELECT fname FROM user WHERE user_id = '$user_id'";
                            $result = mysqli_query($con, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $fname = $row['fname'];
                            } else {
                                // Handle the case where the user is not found or an error occurs
                                $fname = "User";
                            }

                            echo "Hi, $fname!";
                        }
                    ?>
                </h1>              
                <div class="headings-container__instructions">
                    <p>Choose your strand on the selection buttons</p>
                        <div class="headings-container__important-note">
                            <h3>The Assessment includes two parts:</h3> 
                                <li>Interest Assessment</li>
                                <li>Academic Assessment</li>
                            <p>
                                <br>
                                <span class="important-note--reminder">
                                    Assessment may take longer than expected due to
                                        <br>varying test numbers across strands. 
                                            <span class="important-note--reminder-fw">Please note that 
                                                <br>you cannot change tab  or click keys such as window, 
                                                    <br>alt and ctrl keys during assesment.</span>
                                </span>                  
                            </p>     
                        </div>                        
                </div>
            </div>

            <div class="strand-selection__container">
                <form method="POST" class="form-controls">
                    <h3>Strands</h3>
                    <div class="hr-divider"></div>
                    <div class="selection__button-container">
                        <button  type="submit" name ="strand_track" value = "ABM" class="button-controls buttons__display-block">
                        <i class='bx bxs-credit-card'></i>&nbsp;&nbsp;Accountancy Business, and Management
                        </button>
                        <button  type="submit" name ="strand_track" value = "STEM" class="button-controls buttons__display-block">
                        <i class='bx bxs-ruler'></i>&nbsp;&nbsp;Science, Technology, Engineering, and Mathematics
                        </button>
                        <button  type="submit" name ="strand_track" value = "HUMSS" class="button-controls buttons__display-block">
                        <i class='bx bxs-donate-heart'></i>&nbsp;&nbsp;Humanities and Social Sciences</button>
                        <!--  -->
                        <button  type="submit" name ="strand_track" value = "ABM" class="button-controls buttons__display-none">
                        <i class='bx bxs-credit-card'></i>&nbsp;&nbsp;ABM
                        </button>
                        <button  type="submit" name ="strand_track" value = "STEM" class="button-controls buttons__display-none">
                        <i class='bx bxs-ruler'></i>&nbsp;&nbsp;STEM
                        </button>
                        <button  type="submit" name ="strand_track" value = "HUMSS" class="button-controls buttons__display-none">
                        <i class='bx bxs-donate-heart'></i>&nbsp;&nbsp;HUMSS</button>
                    </div>      
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
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