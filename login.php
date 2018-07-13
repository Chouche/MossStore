<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is set direct to index
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['page']))
{
    $pagename = $_GET['page'].".php";
    $pageurl =  $_GET['page'];
}else{
    $pagename = "index.php";
    $pageurl =  "index";
}

if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $upass = $_POST['pass'];

    $password = hash('sha256', $upass); // password hashing using SHA256
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email= ?");
    $stmt->bind_param("s", $email);
    /* execute query */
    $stmt->execute();
    //get result
    $res = $stmt->get_result();
    $stmt->close();

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $count = $res->num_rows;
    if ($count == 1 && $row['password'] == $password) {
        $_SESSION['user'] = $row['id'];
        header("Location: ". $pagename);
    } elseif ($count == 1) {
        $errMSG = "Bad password";
    } else $errMSG = "User not found";
}
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
   
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
     <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <script src="js/modernizr.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>
<body>


<header class="box-header">
    <div class="box-logo">
        <a href="index.php"><img src="img/logo.png" width="60" alt="Logo"></a>
    </div>
    <a class="box-primary-nav-trigger" href="index.php">
        <span class="box-menu-text"><i class="fas fa-home"></i>&nbsp;Home</span>
    </a>
</header>

<section class="box-intro" style="padding-top: 100px">

    <div id="login-form">
                     <div class="table-cell" >
                <h1 class="box-headline letters rotate-2">
                    <span class="box-words-wrapper">
                       
                        
                        <b class="is-visible">Log&nbsp;In.</b>
                        <b>Register.</b>
                        
                     
                    </span>
                </h1>
              
            </div>
        <form method="post" autocomplete="off">

            <div class="col-md-12 ">

            
           

       

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                    </div>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="register.php?page=<?php echo urlencode($pageurl); ?>" type="button" class="btn btn-block btn-danger"
                       name="btn-login">Register</a>
                </div>

            </div>

        </form>
    </div>
    </section >


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script src="js/menu.js"></script>
    <script src="js/animated-headline.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
</body>
</html>
