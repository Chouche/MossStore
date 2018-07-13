<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['user'])) {
    // select logged in users detail
    $res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $res->close();

}

    $gametitle = "gangsta";

    $stmt = $conn->prepare("SELECT * FROM steamkeys WHERE title = ? LIMIT 0, 1");
        
    $stmt->bind_param("s", $gametitle);
    $stmt->execute();

    $game = $stmt->get_result();
    $stmt->close();
    
    




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gangsta Underground: Poker</title>
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
<script type="text/javascript">

    window.addEventListener('load', function() {

  // Check if Web3 has been injected by the browser:
  if (typeof web3 == 'undefined') {
     // Warn the user that they need to get a web3 browser
     // Or install MetaMask, maybe with a nice graphic.
  }

})</script>
    

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
    <div class="top-bar gangsta">
        <h1>Gangsta Underground: Poker</h1>
        <p>VR Game / Poker / Gangsta</p>
    </div>
    <!-- end top-bar -->
    
    <!-- main-container -->
    <div class="container main-container">
        <div class="col-md-12">
            <img src="img/3.jpg" alt="" class="img-responsive" />
            <div class="h-30"></div>
        </div>

        <div class="col-md-12">
            <h3 class="text-uppercase">Gangsta Underground: Poker</h3>
            <h5>Win the game to be the last stand</h5>
            <div class="h-30"></div>
        </div>

        <div class="col-md-9">
            <p>Reality Reflection adopted European and North American style of game art and gaming contents to develop <strong>Gangsta Underground: Poker</strong> in order to penetrate into the AAA VR contents market.</p>
            <p>This exciting game leads users to the thrilling poker league played by gangs and supports 1:1 online multiplayer mode. Various contents such as hilarious looking characters, ranking mode, various items that can be purchased in a store within the game make this game more fascinating and encourage users to get involved in the game.</p>

            <br>
            <br>
            <?php if (!isset($_SESSION['user'])) : ?>
            <a href="login.php?page=gangsta" class="btn-liquid">
                <span class="inner">Coming soon</span>
            </a>
            <?php elseif (isset($_SESSION['user'])) : ?>
                <?php if (is_null(mysqli_fetch_array($game, MYSQLI_ASSOC))) : ?>
                     <a class="btn-liquid" >
                        <span class="inner">Sold Out</span>
                    </a>
                <?php else : ?>
                    <a style="cursor: pointer;" class="btn-liquid" id="sendmosscoin">
                        <span class="inner">Buy it</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <!-- href="send_mail?game=gangsta"-->
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
    <script src="js/web3.min.js"></script>
    <script type="text/javascript">

    window.addEventListener('load', function() {

  // Check if Web3 has been injected by the browser:
  if (typeof web3 === 'undefined') {
         on();
      }else {
     
        web3 = new Web3(window.web3.currentProvider);
        
      }  

        if (web3.version.network != 3) {
         
           document.getElementById("overlay").style.display = "block";
        } else {
          
          mosscoin = web3.eth.contract(abi).at(address);
          
        } 

    })

    function off() {
        
        if (typeof web3 !== 'undefined') {
            log("Found injected web3.");
         document.getElementById("overlay").style.display = "none";
         web3 = new Web3(window.web3.currentProvider);
      }
    }

    function on() {
        document.getElementById("overlay").style.display = "block";
    }


    function waitForReceipt(hash, cb) {
            web3.eth.getTransactionReceipt(hash, function (err, receipt) {
            if (err) {
              error(err);
            }

            if (receipt !== null) {
              // Transaction went through
              if (cb) {
                cb(receipt);
              }
             window.location.href = "send_mail?game=gangsta";
            } else {
              // Try again in 1 second
              window.setTimeout(function () {
                waitForReceipt(hash, cb);
              }, 1000);
            }
          });
        }

    
        var address = "0x865ec58b06bf6305b886793aa20a2da31d034e68";
        var abi = [{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_spender","type":"address"},{"name":"_value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_from","type":"address"},{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"unpause","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_value","type":"uint256"}],"name":"burn","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"paused","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_spender","type":"address"},{"name":"_subtractedValue","type":"uint256"}],"name":"decreaseApproval","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_owner","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"renounceOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"pause","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_spender","type":"address"},{"name":"_addedValue","type":"uint256"}],"name":"increaseApproval","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_owner","type":"address"},{"name":"_spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[{"name":"_amount","type":"uint256"}],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":false,"name":"value","type":"uint256"}],"name":"Burn","type":"event"},{"anonymous":false,"inputs":[],"name":"Pause","type":"event"},{"anonymous":false,"inputs":[],"name":"Unpause","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"previousOwner","type":"address"}],"name":"OwnershipRenounced","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"previousOwner","type":"address"},{"indexed":true,"name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"}];



       
             
            $("#sendmosscoin").click(function (e) {
              
              e.preventDefault();

              if(web3.eth.defaultAccount === undefined) {
                return error("No accounts found. If you're using MetaMask, " + "please unlock it first and reload the page.");

              }

              

              mosscoin.transfer(0x81b7e08f65bdf5648606c89998a9cc8164397647,30000000000000,function (err, hash) {
                if (err) {
                  return error(err);

                }

                waitForReceipt(hash, function () {

                  
              });
            });
        });

   


</script>

</body>

</html>