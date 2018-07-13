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
    <title>Moss Center</title>
    <link rel="icon" href="img/fav.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- modernizr -->
    <script src="js/modernizr.js"></script>

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

    <div id="overlay">
        <div id="textoverlay"><h1 style="color: white">Moss Center</h1>You need to download MetaMask to use this website
            <br><br><a href="https://metamask.io/" target="_blank"><img src="img/metamask.png"></a><br><br>
            <button class="explore" onclick="off()">I downloaded it<span class="icon-right"></span><span class="icon-right after"></span></button>
        </div>
    </div>

    <div class="container-fluid">
        <!-- box header -->
        <header class="box-header">
            <div class="box-logo">
                <a href="index.php"><img src="img/logo.png" width="60" alt="Logo"></a>

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
        <!-- end box header -->

        <!-- end nav -->

        <!-- box-intro -->
        <section class="box-intro"><div id="particles-js"></div>
            
            <div class="table-cell">
                <h1 class="box-headline letters rotate-2">
                    <span class="box-words-wrapper">
                        <?php if (isset($_SESSION['user'])) : ?>
                        <b class="is-visible">Greeting&nbsp;<?php echo $userRow['username']; ?>.</b>
                        <b>MOSS&nbsp;Center.</b>
                        <b>VR&nbsp; Games.</b>
                        <b>AR &nbsp;Games.</b>
                        <?php elseif (!isset($_SESSION['user'])) : ?>
                        <b class="is-visible">MOSS &nbsp;Center.</b>
                        <b>VR&nbsp; Games.</b>
                        <b>AR &nbsp;Games.</b>
                        <?php endif; ?>
                    </span>
                </h1>
                <h5>Buy VR/AR Games <br>with Moss Coin (MOC)</h5>
            </div>

            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </section>
        <!-- end box-intro -->
    </div>
    <!-- portfolio div -->
    <div class="portfolio-div">
        <div class="portfolio">
            <div class="no-padding portfolio_container">
                 <!-- single work -->
                <div class="col-md-12 photography">
                    <a href="mosspop.php" class="portfolio_item">
                        <img src="img/MossPop1000x1000.jpg" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span>Moss Pop </span>
                                    <em>Coming Soon</em>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->
            </div>
        </div>
    </div>
    <!-- portfolio div -->
    <div class="portfolio-div">
        <div class="portfolio">
            <div class="no-padding portfolio_container">
                <!-- single work -->
                <div class="col-md-3 col-sm-6 ads graphics">
                    <a href="gangsta.php" class="portfolio_item">
                        <img src="img/gangsta1000x1000.png" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span>Gangsta Underground: The Poker</span>
                                    <em>Coming Soon</em>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->


                <!-- single work -->
                <div class="col-md-3 col-sm-6 ads graphics">
                    <a href="vmoji.php" class="portfolio_item">
                        <img src="img/vmoji1000x1000.png" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span>Vmoji</span>
                                    <em>Free</em>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-6 col-sm-12 photography">
                    <a href="speedball.php" class="portfolio_item">
                        <img src="img/Speedbal1000x1000.jpg" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span>Speedball Arena </span>
                                    <em>Coming Soon</em>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <div class="col-md-3 col-sm-6 fashion ads">
                    <a href="musicinside.php" class="portfolio_item">
                        <img src="img/MusicInside1000x1000.png" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span>Music Inside</span>
                                    <em>Coming Soon</em>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-3 col-sm-6 fashion ads">
                    <a href="miniaturetd.php" class="portfolio_item">
                        <img src="img/MiniatureTD1000x1000.png" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span>Miniature TD</span>
                                    <em>Coming Soon</em>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                

                
            </div>
            <!-- end portfolio_container -->
        </div>
        <!-- portfolio -->
    </div>
    <!-- end portfolio div -->
        

   

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

    <!-- scripts -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>

<script type="text/javascript">

    window.addEventListener('load', function() {

  // Check if Web3 has been injected by the browser:
  if (typeof web3 === 'undefined') {
     on();
  }else {
    log("Found injected web3.");
    web3 = new Web3(window.web3.currentProvider);
    
  }   

})

function off() {
    
    if (typeof web3 !== 'undefined') {
     document.getElementById("overlay").style.display = "none";
     web3 = new Web3(window.web3.currentProvider);
  }
}

function on() {
    document.getElementById("overlay").style.display = "block";
}

</script>
</body>

</html>