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
<link rel="stylesheet" href="loginmodal.css">
<link rel="stylesheet" href="headerfooter.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    //load register form on login modal
    function register() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("loginmodal-container").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "register.html", true);
        xhttp.send();
    }
    //load login form on login modal
    function login() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("loginmodal-container").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "loginform.html", true);
        xhttp.send();
    }
</script>
    <style>
        .jumbotron {
            background-color: #05305B;
            margin:0;
            padding: 120px 25px;
            color: white;
        }
        .panel {
            border: 0.5px solid #333;
            border-radius: 3.5px;
            transition: box-shadow 0.2s;
        }
        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, 0.3);
        }
        .panel-heading {
            background: #20A378;
            background: linear-gradient(to bottom, #20A378, #026F4B);
            text-align: center;
            color: white;

        }
        .panel-body {
            background-color: #FFFFFF;
            min-height: 375px;
            text-align:center;
        }
        .panel-body p{
            text-align: left;
        }
        .panel-footer {
            background: #20A378;
            text-align: center;
            background: linear-gradient(to bottom, #20A378, #026F4B);
        }
        .lmorebtn {
            background: linear-gradient(to bottom, white, lightgrey);
            color: black;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
        }

        .lmorebtn:active {
            background-color: white;
        }
        .bg4{
            background-color: #fffff5;
            padding-top: 0;
            text-align:center;
        }
        .bg5 {
            background: linear-gradient(to bottom, #fffff5, #f8f8f8);
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="10" onload="login();">
    <!-- navigation bar -->
    <nav class="navbar navbar-default navbar-fixed-top" id="header_nav">
        <div class="container-fluid">
            <div class="navbar-header pull-left">
                <img src="logo/logo.png" class="logo" id="nav_logo"> FridgeMates
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
                        echo '<button type="button" class="btn" id="login_btn" data-toggle="modal" data-target="#login-modal">Log In</button>';
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
            </div>
        </div>
    </div>
    <!-- wrapper for content of the page -->
    <div id="content" class="page-wrap">
        <div class="jumbotron text-center">
            <h1>Green Thumb Initiative</h1>
            <p>There is no 'i' in team.</p>
        </div>

        <div class="container-fluid bg4">
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
            </div></div>
        <div class="container-fluid bg5">
            <div clas="row">
                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Grocery Buddy</h1>
                        </div>
                        <div class="panel-body">
                            <img src="./logo/grocerybuddylogo.png" height="150" width="150">
                            <p>Plan your shopping trips by creating, organizing, and saving grocery lists.
                                Store information about what you buy in a virtual fridge with tracking bars to show how fresh your food is.
                                Worried about your food going bad? Grocery Buddy will send you notifications if anything in your virtual fridge is nearing its expiry date.

                                Make the most out of the food you buy!</p>
                        </div>
                        <div class="panel-footer">
                            <a href="#"><button class="btn btn-lg lmorebtn">Learn More</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Freshness</h1>
                        </div>
                        <div class="panel-body">
                            <img src="./logo/freshnesslogo.png" height="150" width="150">
                            <p>Freshness provides the food preservation methods for you to keep the food fresh as long as you can.
                                Your new best friend for planning what food to buy and making sure you use it.</p>
                        </div>
                        <div class="panel-footer">
                            <a href="#"><button class="btn btn-lg lmorebtn">Learn More</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Phoenix Recipes</h1>
                        </div>
                        <div class="panel-body">
                            <img src="./logo/phoenixrecipeslogo.png" height="150" width="150">
                            <p>A user friendly mobile cookbook that helps you discover
                                new and delicious ways to use your leftovers, and track your food waste</p>
                        </div>
                        <div class="panel-footer">
                            <a href="#"><button class="btn btn-lg lmorebtn">Learn More</button></a>
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