<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <title>Affiliated Pages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function $(id){
            var element = document.getElementById(id);
            if( element == null )
                alert( "Programmer error: " + id + " does not exist." );
            return element;
        }

        function content() {
        <?php
            if(isset($_SESSION['USER_ID']) &&
                (trim($_SESSION['USER_ID']) != '')) {
                echo 'var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        $("content").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "welcome.php", true);
                xhttp.send();';
            }
            else {
                echo 'var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        $("content").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "loginform.php", true);
                xhttp.send();';
            }
                ?>
        }
    </script>

    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto);

        /****** LOGIN MODAL ******/
        .loginmodal-container {
            padding: 30px;
            max-width: 350px;
            width: 100% !important;
            background-color: #F7F7F7;
            margin: 0 auto;
            border-radius: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            font-family: roboto;
        }

        .loginmodal-container h1 {
            text-align: center;
            font-size: 1.8em;
            font-family: roboto;
        }

        .loginmodal-container input[type=submit] {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            position: relative;
        }

        .loginmodal-container input[type=text], input[type=password] {
            height: 44px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 10px;
            -webkit-appearance: none;
            background: #fff;
            border: 1px solid #d9d9d9;
            border-top: 1px solid #c0c0c0;
            /* border-radius: 2px; */
            padding: 0 8px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .loginmodal-container input[type=text]:hover, input[type=password]:hover {
            border: 1px solid #b9b9b9;
            border-top: 1px solid #a0a0a0;
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }

        .loginmodal {
            text-align: center;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
            font-weight: 700;
            height: 36px;
            padding: 0 8px;
            /* border-radius: 3px; */
            /* -webkit-user-select: none;
            user-select: none; */
        }

        .loginmodal-submit {
            /* border: 1px solid #3079ed; */
            border: 0px;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.1);
            background-color: #3A6A9B;
            padding: 17px 0px;
            font-family: roboto;
            font-size: 14px;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
        }

        .loginmodal-submit:hover {
            /* border: 1px solid #2f5bb7; */
            border: 0px;
            text-shadow: 0 1px rgba(0,0,0,0.3);
            background-color: #5B86B2;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
        }

        .loginmodal-container a {
            text-decoration: none;
            color: #666;
            font-weight: 400;
            text-align: center;
            display: inline-block;
            opacity: 0.6;
            transition: opacity ease 0.5s;
        }

        .login-help{
            font-size: 12px;
        }

        /** Navbar CSS **/
        .navbar {
            background-color: #333;
            color: black;
            border: 0;
        }
        .navbar li a, .navbar {
            color: white !important;
            text-align:center;
        }
        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #ffffff !important;
            background-color: #0A8E62 !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }
        .navbar-toggle {
            background-color: transparent;
        }

        /** login button CSS **/
        #loginbtn {
            background-color: #0A8E62;
            color: white;
            border: 0;
            margin-bottom: 0;
            margin-top: 8px;
            margin-left: 25px;
            margin-right: 15px;
            float:right;
        }
        #loginbtn:hover {
            background-color: #20A378;
            color: white;
        }

        /** jumbotron CSS **/
        .jumbotron {
            background-color: #05305B;
            margin-top: 50px;
            margin-bottom: 0;
            padding: 120px 25px;
            color: white;
        }



        /** Footer CSS **/
        footer {
            text-align: center;
            background-color: #333;
            color: white;
            height: 50px;
            width: 100%;
            padding: 5px;
            position: relative;
            bottom: 0;
        }
        footer a{
            color: white;
        }
        footer a:hover {
            color: #0A8E62;
        }
        footer p{
            margin: 0;
        }

        /** panel CSS **/
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
        }

        .panel-body p{
            text-align: left;
        }
        .panel-footer {
            background: #20A378;
            text-align: center;
            background: linear-gradient(to bottom, #20A378, #026F4B);
        }

        /** Learn More button CSS **/
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

        /** Logo CSS **/
        .logo {
            width: 25px;
            height: 40px;
            border: 0;
            margin-bottom: 0;
            margin-top: 5px;
            margin-left: 50px;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="10">

<!--the nav bar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header pull-left">
        	<!--hamburger menu button-->
            <img src="./logo/logo.png" class="logo">&nbsp;&nbsp;FridgeMates
        </div>
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
                if(isset($_SESSION['USER_ID']) &&
                (trim($_SESSION['USER_ID']) != '')) {
                    echo '<div class="btn-group"><button type="button" id="loginbtn" class="btn dropdown-toggle" data-toggle="dropdown" style="margin-left:25px">'.$_SESSION["USER_NAME"].'</button>
            <ul class="dropdown-menu">
                <li><a href="#">ACCOUNT</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul></div>';
        }
        else {
        echo '<button type="button" id="loginbtn" class="btn" data-toggle="modal" data-target="#login-modal">Log In</button>';
        }
        ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <!--menu in the navbar/collapsible menu-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">HOME</a></li>
                <?php
                    if(isset($_SESSION['USER_ID']) &&
                    (trim($_SESSION['USER_ID']) != '')) {
                        echo '<li><a href="fridge.php">MY FRIDGES</a></li>';
                }
                ?>
                <li><a href="affiliate.html">AFFILIATES</a></li>
                <li><a href="#bg3">ABOUT US</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--login modal-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login to Your Account</h1><br>
            <form action="login.php" method="POST">
                <input type="text" name="login_username" placeholder="Username">
                <input type="password" name="login_password" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help">
                <a href="#">Register</a> - <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
</div>

<!--jumbotron of the title-->
<div class="jumbotron text-center">
    <h1>Green Thumb Initiative</h1>
    <p>There is no 'i' in team.</p>
</div>

<!--first div to describe this page -->
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

<!--second div containing panels for affilate apps-->
<div class="container-fluid bg5">
    <div clas="row">

    	<!--first affilate app-->
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

        <!--second affiate app-->
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

        <!--third affiliate app-->
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


<footer>
    <a href="#">About Us</a>
    <p>Copyright &copy; 2017 FridgeMates</p>
</footer>
</body>
</html>