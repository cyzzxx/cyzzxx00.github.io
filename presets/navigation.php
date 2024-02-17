<?php
    // Include your existing database connection
    include 'connection.php';

        // Query to count null or empty statuses
        $sql = "SELECT COUNT(*) AS count_null_status FROM user WHERE status IS NULL OR status = ''";
        $result = $con->query($sql);

        $count = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $count = $row['count_null_status'];
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS links -->
    <link rel="stylesheet" href="css/admin-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/input-file.css">
    <link rel="stylesheet" href="css/forms-buttons/forms-buttons-styles.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">

    <!-- JS links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="script.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Charts.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <script>history.scrollRestoration = "manual"</script> 
    <!-- Loader Animation -->
    <div class="loader" id="loader">
		<img src="assets/loader/Pulse-1s-104px.svg"/>
	</div>
    <!-- Dashboard wrapper -->
    <div class="dashboard-wrapper">
        <!-- Side navigation -->
        <aside class="admin-side-panel">
            <h1>Admin</h1>
            <div class="panel__user">
                <h3>FEAPITSAT</h3>
                <h4>Admin</h4>
            </div>
            <h4>Core</h4>
            <div class="hr-divider" role="separator"></div>
            <div class="panel__list-wrapper">
                <ul>
                    <li><a href="admin-dashboard.php" ><i class='bx bxs-dashboard'></i>&nbsp;&nbsp;Dashboard</a></li>
                    <li><a href="admin-records.php" ><i class='bx bx-book-content'></i>&nbsp;&nbsp;Records</a></li>
                    <li>
                        <a href="admin-approval.php" class="menu-link">
                            <span class="menu-item">
                                <i class='bx bx-list-ul'></i>&nbsp;&nbsp;Pending Request
                            </span>
                            <?php
                            // Include the PHP code to fetch the count here

                            // Display red circle notification if count is greater than 0
                            if ($count > 0) {
                                echo "<span class='notification-badge'>$count</span>";
                            }
                            ?>
                        </a>
                    </li>
                        <li class="role-dropdown"><a>
                        <i class='bx bxs-user-circle'></i>&nbsp;&nbsp;Profile
                        <i class='bx bx-chevron-down' style="
                                font-size: 1.5rem;
                                transform: translateY(4.4px);"></i></a></li>
                        <div class="list-dropdown__role">
                            <ul>
                                <li class="role__lists show-modal" onclick="showRoleModal()"><a><i class='bx bx-edit'></i>&nbsp;&nbsp;Edit Profile</a></li>
                            </ul>                    
                        </div>
                </ul> 
                    <!-- PHP -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $newEmail = $_POST['new_email'];
                        $newPassword = $_POST['new_password'];
                        $adminId = $_SESSION['id'];

                        // Fetch the current email from the database
                        $selectEmailQuery = "SELECT email FROM admin WHERE id = $adminId";
                        $result = mysqli_query($con, $selectEmailQuery);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $currentEmail = $row['email'];
                        } else {
                            $currentEmail = ''; // Default value if email is not found
                        }

                        if (!empty($newEmail)) {
                            if (!empty($newPassword)) {
                                // Hash the new password using password_hash
                                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                                // Update both email and password in the database
                                $updateQuery = "UPDATE admin SET email = '$newEmail', password = '$hashedPassword' WHERE id = $adminId";
                            } else {
                                // Update only the email in the database
                                $updateQuery = "UPDATE admin SET email = '$newEmail' WHERE id = $adminId";
                            }

                            if (mysqli_query($con, $updateQuery)) {
                                // Update successful using SweetAlert
                                echo "<script>
                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Profile updated successfully',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            window.location.href = '1n4i13m9d14a-cjrh.php';
                                        });
                                    </script>";
                                exit;
                            } else {
                                echo "<script>alert('Failed to update profile');</script>";
                            }
                        } else {
                            echo "<script>alert('Please enter a valid email');</script>";
                        }
                    }

                    // Fetch the current email from the database
                    if (isset($_SESSION['id'])) {
                        $adminId = $_SESSION['id'];
                        $selectEmailQuery = "SELECT email FROM admin WHERE id = $adminId";
                        $result = mysqli_query($con, $selectEmailQuery);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $currentEmail = $row['email'];
                        }
                    }
                ?>

            </div>          
            <h4>Information</h4>
            <div class="hr-divider" role="separator"></div>
            <div class="panel__list-wrapper">
                <ul>
                    <li><a href="admin-courses.php"><i class='bx bx-code-curly'></i>&nbsp;&nbsp;Courses</a></li>
                    <li class="strand-dropdown"><a>
                        <i class='bx bxs-brain'></i>&nbsp;&nbsp;Assessment&nbsp;
                        <i class='bx bx-chevron-down' style="
                                font-size: 1.5rem;
                                transform: translateY(4.4px);"></i></a></li>
                        <!-- Drowndown on click -->
                        <div class="list-dropdown__content">
                            <ul>
                                <li onclick="redirectionStrPageAbm()"><a href="admin-abm-questions.php"><i class='bx bxs-credit-card'></i>&nbsp;&nbsp;ABM</a></li>
                                <hr>
                                <li onclick="redirectionStrPageStem()"><a href="admin-stem-questions.php"><i class='bx bxs-ruler'></i>&nbsp;&nbsp;STEM</a></li>
                                <hr>
                                <li onclick="redirectionStrPageHumss()"><a href="admin-humss-questions.php"><i class='bx bxs-donate-heart'></i>&nbsp;&nbsp;HUMSS</a></li>
                            </ul>                    
                        </div>
                        <li><a href="student-lrn.php"><i class='bx bx-id-card'></i>&nbsp;&nbsp;LRN</a></li>

                </ul>
            </div>
        </aside>

        <!-- Mobile view side nav -->
        <aside class="aside__min-width">
            <div class="aside--icons">
                <!-- Dashboard -->
                <i class='bx bxs-dashboard' onclick="redirectionDashboard()"></i>
                <span class="icon-label">Dashboard</span>
                <!-- Records -->
                <i class='bx bx-book-content' onclick="redirectionRecords()"></i>
                <span class="icon-label">Records</span>
                <!-- Pending Request -->
                <span style="position: relative;">
                    <i class='bx bx-list-ul' onclick="redirectionPendReq()"></i>
                        <?php
                        // Include the PHP code to fetch the count here
                        // Display red circle notification if count is greater than 0
                        if ($count > 0) {
                            echo "<span class='notification-badge' style='position: absolute; top: 0; right: -1rem; border: 4px solid hsl(208, 99%, 36%);'>$count</span>";
                        }
                        ?>
                </span>
                <span class="icon-label">Request</span>
                <!-- Roles -->
                <button class="show-modal--aside aside-button" onclick="showRoleModalAside()">
                    <i class='bx bxs-user-circle' ></i>
                </button>         
                <span class="icon-label">Profile</span>
                <!-- Courses -->
                <i class='bx bx-code-curly' onclick="redirectionCourses()"></i>
                <span class="icon-label">Courses</span>
                <div class="hr-divider" role="separator"></div>
                <!-- ABM -->
                <i class='bx bxs-credit-card' onclick="redirectionStrPageAbm()"></i>
                <span class="icon-label">ABM</span>
                <!-- STEM -->
                <i class='bx bxs-ruler' onclick="redirectionStrPageStem()"></i>
                <span class="icon-label">STEM</span>
                <!-- HUMSS -->
                <i class='bx bxs-donate-heart' onclick="redirectionStrPageHumss()"></i>
                <span class="icon-label">HUMSS</span>
                <!-- LRN -->
                <i class='bx bx-id-card' onclick="redirectionLrn()"></i>
                <span class="icon-label">LRN</span>
            </div>
        </aside>
        <!-- Role Management Modal / Admin -->
        <dialog class="role__modal-card role__modal-card--aside">
            <form method="post" class="form-controls">
                <h3>Edit Profile</h3>
                <input type="email" name="new_email" id="new_email" placeholder="<?php echo $currentEmail; ?>" autocomplete="off" required style="border: none; padding-left: 0;">
                <input type="password" name="new_password" id="new_password" placeholder="New Password" autocomplete="new-password">
                    <div class="edit-profile-button-wrapper">
                        <button type="submit" class="button-controls role-button">Update</button>
                        <button type="button" class="button-controls hide-modal hide-modal--aside role-button">Close</button>
                    </div>
            </form>
        </dialog> 
        <!-- Dashboard -->
        <div class="dashboard-contents">
            <nav class="admin-top-navigation">
                <div class="navigation__logo-wrapper">
                    <img src="assets/logo/62a98bedbc49a_TANZAPIC1-cropped.jpg" alt="FEAPITSAT" width="100" style="height: 60px;">
                </div>
                <div class="navigation__links">
                    <button type="button" onclick="logoutAdmin()">Logout <i class='bx bx-log-out-circle' ></i> </button>        
                </div>               
            </nav>

            <script>
                function logoutAdmin() {
                    Swal.fire({
                      title: 'Are you sure?',
                      text: 'Do you really want to logout?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Yes',
                      cancelButtonText: 'No',
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "logout-admin.php";
                      } else {
                        Swal.close();
                      }
                    });
                  }
            </script>
            <script>
                function redirectionDashboard(){
                    window.location.href = "admin-dashboard.php";
                }

                function redirectionRecords(){
                    window.location.href = "admin-records.php";
                }

                function redirectionPendReq(){
                    window.location.href = "admin-approval.php";
                }

                function redirectionRoles(){
                    window.location.href = "admin-profile-settings.php";
                }

                function redirectionCourses(){
                    window.location.href = "admin-courses.php";
                }

                function redirectionStrPageAbm(){
                    window.location.href = "admin-abm-questions.php";
                }

                function redirectionStrPageStem(){
                    window.location.href = "admin-stem-questions.php";
                }

                function redirectionStrPageHumss(){
                    window.location.href = "admin-humss-questions.php";
                }

                function redirectionLrn(){
                    window.location.href = "student-lrn.php";
                }
            </script>

            <script>
                var sidePanelMenu = document.getElementsByClassName('side-panel-menu');
                var sidePanel = document.querySelector(".admin-side-panel");

                    for (j = 0; j < sidePanelMenu.length; j++){
                        sidePanelMenu[j].addEventListener("click", function() {
                            if(sidePanel.style.minWidth){
                                sidePanel.style.minWidth = null;
                            } else {
                                sidePanel.style.minWidth = "250px";
                            }
                        });
                    }
            </script>
            <script>
                var showDropdown = document.getElementsByClassName('strand-dropdown');
                var strandList = document.querySelector(".list-dropdown__content");

                    for (i = 0; i < showDropdown.length; i++) {
                        showDropdown[i].addEventListener("click", function() {
                    
                            if (strandList.style.maxHeight){
                                strandList.style.maxHeight = null;
                            } else {
                                strandList.style.maxHeight = "100px";
                            } 
                        });
                    }
            </script>

            <script>
                var showRoleDropdown = document.getElementsByClassName('role-dropdown');
                var roleList = document.querySelector(".list-dropdown__role");

                    for (i = 0; i < showRoleDropdown.length; i++) {
                        showRoleDropdown[i].addEventListener("click", function() {
                    
                            if (roleList.style.maxHeight){
                                roleList.style.maxHeight = null;
                            } else {
                                roleList.style.maxHeight = "100px";
                            } 
                        });
                    }
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
                function showRoleModal(){
                    var showRoleM = document.querySelector('.show-modal');
                    var hideRoleModal = document.querySelector('.hide-modal');
                    var roleModalCard = document.querySelector('.role__modal-card');

                    showRoleM.addEventListener('click', () => {
                        roleModalCard.showModal();
                    })

                    hideRoleModal.addEventListener('click', () => {
                        roleModalCard.close();
                    })
                }
            </script>

            <script type="text/javascript">
                function showRoleModalAside(){
                    var showRoleAside = document.querySelector('.show-modal--aside');
                    var hideRoleModalAside = document.querySelector('.hide-modal--aside');
                    var roleModalCardAside = document.querySelector('.role__modal-card--aside');

                    showRoleAside.addEventListener('click', () => {
                        roleModalCardAside.showModal();
                    })

                    hideRoleModalAside.addEventListener('click', () => {
                        roleModalCardAside.close();
                    })
                }
            </script>
