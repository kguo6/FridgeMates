<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
<title>FridgeMates-Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/loginmodal.css">
<link rel="stylesheet" href="css/headerfooter.css">
<link rel="stylesheet" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/makeItRain.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/register-validate.js"></script>
<script src="js/login-validate.js"></script>
<script src="js/makeItRain.js"></script>

<script>

    var $canvas
    function scroll(){
        if ($canvas.position().left!=-956){
            $canvas.animate({left: "-=239"});
        }else{
            $canvas.animate({left: 0});
        }
    }
    //index page function to load pre/post login homepage
    function content() {
        <?php
            if(isset($_SESSION['USER_ID']) &&
	          (trim($_SESSION['USER_ID']) != '')) {
                  echo 'var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if(this.readyState == 4 && this.status == 200) {
                                document.getElementById("content").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "welcome.php", true);
                        xhttp.send();';
            }
            else {
                echo 'var xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                          if(this.readyState == 4 && this.status == 200) {
                              document.getElementById("content").innerHTML = this.responseText;
                              $(function(){
                                  $canvas=$("div.canvas")
                                  $("#slider_mobile li.active").fadeIn().delay(2200).fadeOut();        
                                  setInterval(scroll, 3000);
                                  setInterval(toggleSlide, 3000);
                                  setInterval(toggleSlide_mobile, 3000);
                              });
                          }
                      };
                      xhttp.open("GET", "home.php", true);
                      xhttp.send();';
            }
        ?>
    }
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
    // counter for clicks
    // invokes js when click condition is met
    var counter=0;
    $(document).ready(function(){
        $("#click").on(
            "click",function(){
                 if(counter == 4) {
                     $(this).makeItRain();
                 }
                 else {
                     counter++;
                 }
        });
    });
    var toggleSlide = function(){
        $("#slider li.active").removeClass().next().add("#slider li:first").last().addClass("active").delay(2200);
    }
    var toggleSlide_mobile = function(){
        $("#slider_mobile li.active").removeClass().next().add("#slider_mobile li:first").last().addClass("active").fadeIn().delay(2200).fadeOut();
    }
    </script>
</head>
<body data-target=".navbar" data-offset="10" onload="content();login();">
    <!-- facebook stuff -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
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
                        echo '<div class="btn-group" id="account_group"><button type="button" class="btn" id="login_btn" dropdown-toggle" data-toggle="dropdown">'.$_SESSION["USER_NAME"].'</button>
                                <ul class="dropdown-menu" id="account_dropdown">
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
    </div>
    <!-- footer -->
    <footer>
        <a href="about.php">About Us</a> | <a href="tos.php">Terms</a> | <a href="privacy.php">Privacy</a>
        <p>Copyright <span id="click">&copy;</span> 2017 FridgeMates </p>
        <div class="fb-like" data-href="https://www.facebook.com/fridgemates" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
    </footer>
</body>
</html>