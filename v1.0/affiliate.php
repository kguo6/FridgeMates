<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
<title>FridgeMates-Affiliate Apps</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/loginmodal.css">
<link rel="stylesheet" href="css/headerfooter.css">
<link rel="stylesheet" href="css/affiliates.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/register-validate.js"></script>
<script src="js/login-validate.js"></script>
<script>
    //load register form on login modal
    function register() {
        document.getElementById("loginContainer").style.display ="none";
        document.getElementById("registerContainer").style.display ="block";
        document.getElementById("errorContainer").style.display ="none";
        document.getElementById("loginForm").reset();
        document.getElementById("registerForm").reset();
    }
    //load login form on login modal
    function login() {
        document.getElementById("registerContainer").style.display ="none";
        document.getElementById("loginContainer").style.display ="block";
        document.getElementById("errorContainer").style.display ="none";
        document.getElementById("registerForm").reset();
        document.getElementById("loginForm").reset();
    }
</script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="10" onload="login();">
    <!-- navigation bar -->
    <nav class="navbar navbar-default navbar-fixed-top" id="header_nav">
        <div class="container-fluid">
            <div class="navbar-header pull-left">
                <a href="index.php"><img src="logo/logoblue.png" class="logo" id="nav_logo"></a>
            </div>
            <div class="navbar-header navbar-right">
                <button type="button" id="nav_toggle" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <?php
                    if(isset($_SESSION['USER_ID']) &&
                    (trim($_SESSION['USER_ID']) != '')) {
                        echo '<div class="btn-group" id="account_group"><button type="button" class="btn" id="login_btn" dropdown-toggle" data-toggle="dropdown" style="margin-left:25px">'.$_SESSION["USER_NAME"].'</button>
                                <ul class="dropdown-menu" id="account_dropdown">
                                    <li><a href="account.php">ACCOUNT</a></li>
                                    <li><a href="logout.php">LOGOUT</a></li>
                                </ul></div>';
                    }
                    else {
                        echo '<button type="button" class="btn" id="login_btn" data-toggle="modal" data-target="#login-modal" onclick="login()">Log In</button>';
                    }
                ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right" id="nav_list">
                    <li><a href="index.php">HOME</a></li>
                    <?php
                        if(isset($_SESSION['USER_ID']) &&
                        (trim($_SESSION['USER_ID']) != '')) {
                            echo '<li><a href="fridge.php">MY FRIDGES</a></li>';
                        }
                    ?>
                    <li><a href="affiliate.php">AFFILIATES</a></li>
                    <li><a href="support.php">SUPPORT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- login/register modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container" id="loginmodal-container">
                <div id="registerContainer">
                    <h1>Register a New Account</h1><br>
                    <form method="POST" id="registerForm">
                        <input type="text" name="register_username" placeholder="Email">
                        <input type="password" id="register_password" name="register_password" placeholder="Password (Min. 6 Characters)">
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                        <input type="text" name="register_name" placeholder="Username (Min. 4 Characters)">
                        <input type="submit" name="login" class="login loginmodal-submit" id="register_btn" value="Register">
                    </form>
                                        
                    <div class="login-help">
                        <a href="#" onclick="login()">Login</a>
                    </div>
                </div>
                <div id="loginContainer">
                    <h1>Login to Your Account</h1><br>
                    <form method="POST" id="loginForm">
                        <input type="text" name="login_username" placeholder="Email">
                        <input type="password" name="login_password" placeholder="Password">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>
                                        
                    <div class="login-help">
                        <a href="#" id="registerLink" onclick="register()">Register</a>
                    </div>
                </div>
                <div id="errorContainer">
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper for content of the page -->
    <div id="content" class="page-wrap">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Green Thumb Initiative</h1>
                <p>There is no 'i' in team.</p>
            </div>
        </div> 

        <div class="container-fluid card_one">
            <div class="row">

                <div class="col-sm-2"></div>

                <div class="col-sm-8">
                    <h2>Going Green</h2>
                    <p>Don’t wait any longer and become part of the Green Thumb Initiative.
                        By using our app or any of our associated partners you can be part of
                        the Green Thumb Initiative, a global movement to help raise awareness about
                        food waste and promote environmental conservation.</p>
                </div>
            <div class="col-sm-2"></div>
            </div>
        </div>
        
        <div class="container-fluid bg5">
            <div clas="row">
                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Grocery Buddy</h1>
                        </div>
                        <div class="panel-body">
                            <img src="./logo/grocerybuddylogo.png" height="150" width="150" alt="Grocery Buddy Logo">
                            <p>Plan your shopping trips by creating, organizing, and saving grocery lists.
                                Store information about what you buy in a virtual fridge with tracking bars to show how fresh your food is.
                                Worried about your food going bad? Grocery Buddy will send you notifications if anything in your virtual fridge is nearing its expiry date.

                                Make the most out of the food you buy!</p>
                        </div>
                        <div class="panel-footer">
                            <a href="https://grocerybuddy-fe337.firebaseapp.com/main"><button class="btn btn-lg lmorebtn">Learn More</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Freshness</h1>
                        </div>
                        <div class="panel-body">
                            <img src="./logo/freshnesslogo.png" height="150" width="150" alt="Freshness Logo">
                            <p>Freshness provides the food preservation methods for you to keep the food fresh as long as you can.
                                Your new best friend for planning what food to buy and making sure you use it.</p>
                        </div>
                        <div class="panel-footer">
                            <a href="http://xyz-online.xyz"><button class="btn btn-lg lmorebtn">Learn More</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Phoenix Recipes</h1>
                        </div>
                        <div class="panel-body">
                            <img src="./logo/phoenixrecipeslogo.png" height="150" width="150" alt="Phoenix Recipes Logo">
                            <p>A user friendly mobile cookbook that helps you discover
                                new and delicious ways to use your leftovers, and track your food waste</p>
                        </div>
                        <div class="panel-footer">
                            <a href="https://phoenix-recipes.firebaseapp.com"><button class="btn btn-lg lmorebtn">Learn More</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <a href="about.php">About Us</a> | <a href="sitemap.php">Site Map</a>
        <p>Copyright &copy; 2017 FridgeMates </p>
    </footer>
</body>
</html>