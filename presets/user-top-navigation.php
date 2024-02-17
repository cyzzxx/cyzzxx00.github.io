<!-- HTML DOCUMENT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEAPITSAT - CORE</title>

    <!-- Links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="assets/logo/fea-logo.png">

    <!-- CSS / JS link -->
    <link rel="stylesheet" href="css/strand-selection-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/assessment-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/footer-header/header-footer-styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/forms-buttons/forms-buttons-styles.css?v=<?php echo time(); ?>">
    <script src="script.js" async></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        body{
            overflow-x: hidden;
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
                <li><a href="javascript:void(0);" onclick="confirmEndProgress()">Home</a></li>
            </ul>
            <i class='bx bx-menu' id="bxMenu" onclick="funcShow()"></i>
            <i class='bx bx-x' id="bxX" onclick="funcHide()"></i>
        </nav>
    </header>
    <!-- Side Nav -->
    <div class="side-nav" id="sideNav">
        <div class="side-navigation" id="sideNavRight">
            <div class="hr-divider"></div>
                <ul>
                    <li><a href="javascript:void(0);" onclick="confirmEndProgress()">Home</a></li>
                </ul>
        </div>
    </div>