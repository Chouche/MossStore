<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['user'])) {
    // select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Miniature TD</title>
    <link rel="icon" href="img/fav.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet">


    <!-- modernizr -->
    <script src="js/modernizr.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="pre-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- end Preloader -->

    <div class="container-fluid">
       <!-- box-header -->
        <header class="box-header">
            <div class="box-logo ">
                <a class="box-menu-text" href="index.php"><i class="fas fa-arrow-left"></i>&nbsp; &nbsp;RETURN</a>

            </div>
            <?php if (!isset($_SESSION['user'])) : ?>
                    <a class="box-primary-nav-trigger" href="login.php">
                    <span class="box-menu-text"><i class="fas fa-user"></i></i>&nbsp;Log In</span>
                    </a>
            <?php elseif (isset($_SESSION['user'])) : ?>
                    <a class="box-primary-nav-trigger" href="logout.php?logout">
                    <span class="box-menu-text"><i class="fas fa-user-check"></i>&nbsp;<?php echo $userRow['username']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-power-off"></i></i>&nbsp;Log Out</span>
                    </a>
            <?php endif; ?>
        </header>
        <!-- end box-header -->
        
        
    </div>
    
    <!-- top-bar -->
    <div class="top-bar td">
        <h1>Miniature TD</h1>
        <p>VR Game / Tower Defense / Cubeworld</p>
    </div>
    <!-- end top-bar -->
    
    <!-- main-container -->
    <div class="container main-container">
        <div class="col-md-12">
            <img src="img/miniaturetd.png" alt="" class="img-responsive" />
            <div class="h-30"></div>
        </div>

        <div class="col-md-12">
            <h3 class="text-uppercase">Miniature TD</h3>
            <h5>Brun them all!</h5>
            <div class="h-30"></div>
        </div>

        <div class="col-md-9">
            <p>Are you ready to play a realistic tower defense game? Miniature TD provides an unconventional VR experience for you.</p>
            <p>Build towers to defend your base from cute monsters. Use the Oculus Touch to grab a tower and place it on the floating map.</p>

            <br>
            <br>
            <?php if (!isset($_SESSION['user'])) : ?>
            <a href="login.php?page=miniaturetd" class="btn-liquid">
                <span class="inner">Coming soon</span>
            </a>
            <?php elseif (isset($_SESSION['user'])) : ?>
            <a href="#" class="btn-liquid">
                <span class="inner">Coming soon</span>
            </a>
            <?php endif; ?>
        </div>

        <div class="col-md-3">
            <ul class="cat-ul">
                <li><i class="ion-ios-circle-filled"></i> Developper : Reality Reflection</li>
                <li><i class="ion-ios-circle-filled"></i> Publisher : Reality Reflection</li>
            </ul>
            <div class="h-10"></div>

            
        </div>
    </div>
    <!-- end main-container -->


    <!-- footer -->
    /
    <!-- end footer -->
    
    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->




    <!-- jQuery -->
    <script src="js/jquery-2.1.1.js"></script>
    <!--  plugins -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/animated-headline.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>


    <!--  custom script -->
    <script src="js/custom.js"></script>
    <script src="js/btn-liquid.js"></script>

</body>

</html>