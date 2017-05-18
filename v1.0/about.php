<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
<title>FridgeMates-About US Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/loginmodal.css">
<link rel="stylesheet" href="css/headerfooter.css">
<link rel="stylesheet" href="css/about.css">
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
                <img src="logo/logoblue.png" class="logo" id="nav_logo">
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
        <div class="jumbotron text-center">
            <h1 class="underline"><span>Welcome</span></h1>
            <h2>We are team 30, a group of cs students that<br> share the passions for preserving the environment</h2>
        </div>

        <div class="container-fluid bg1" style="background-color: #C7D3C8;  padding:40px">
			<div class="col-sm-16">
			<p class="smalltxt"><i>“Imagine walking out of a grocery store with four bags of groceries, dropping one in the parking lot, and just not bothering to pick it up. That’s essentially what we’re doing.”</i> - Dana Gunders </p>
			</div>
			<p class="largetxt">People in a community (i.e. offices, families, dormitories, etc.) are unaware of what food items are available and what can be eaten in a shared fridge. FridgeMates is a web app that keeps track of users, the user’s leftover food, and the amount of time each food item has been in the fridge. Our goal is to  improve society's behavior toward food waste and awareness towards preserving the environment.
        </div>
        
        <div class="container-fluid bg2" style="background-color: #3BB245; padding-bottom: 40px">
            <h2 style="display:inline-block; border-bottom:3px solid #3BB245;">Meet the Team</h2>
    <div class="row">
        <div class="col-sm-4">
				<div class="icon">
					<img src="http://img0.liveinternet.ru/images/attach/c/8/100/933/100933038_large_tumblr_mlfc88lgS61roihxco5_250.png" alt="Kevin1">
				<h3 style="text-align:center">Ryan Mar</h3>
				</div>
				<p style="text-align:center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			</div>
        <div class="col-sm-4">
				<div class="icon">
					<img src="http://img1.liveinternet.ru/images/attach/c/8/100/933/100933041_large_tumblr_mlfc88lgS61roihxco8_250.png" alt="Kevin2">
					<h3 style="text-align:center">Kenny Guo</h3>
				</div>
				<p style="text-align:center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			</div>
        <div class="col-sm-4">
				<div class="icon">
					<img src="http://img1.liveinternet.ru/images/attach/c/8/100/933/100933037_large_tumblr_mlfc88lgS61roihxco4_250.png" alt="Kevin3">
					<h3 style="text-align:center">Wayne Huang</h3>
				</div>
				<p style="text-align:center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			</div>
        <div class="col-sm-4">
				<div class="icon">
					<img src="http://img1.liveinternet.ru/images/attach/c/8/100/933/100933035_large_tumblr_mlfc88lgS61roihxco1_250.png" alt="Kevin4">
					<h3 style="text-align:center; border-bottom:3px solid #3BB245">Vincent Lam</h3>
				</div>
				<p style="text-align:center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			</div>
        <div class="col-sm-4">
				<div class="icon">
					<img src="http://img0.liveinternet.ru/images/attach/c/8/100/933/100933040_large_tumblr_mlfc88lgS61roihxco7_250.png" alt="Kevin5">
					<h3 style="text-align:center">Shang Li</h3>
				</div>
				<p style="text-align:center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
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