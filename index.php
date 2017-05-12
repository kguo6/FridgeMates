<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

    /** Login Modal CSS**/
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

    .loginmodal-container input[type=text], .loginmodal-container input[type=password] {
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

    .loginmodal-container input[type=text]:hover, .loginmodal-container input[type=password]:hover {
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
    background-color: #4d90fe;
    padding: 17px 0px;
    font-family: roboto;
    font-size: 14px;
    /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
    }

    .loginmodal-submit:hover {
    /* border: 1px solid #2f5bb7; */
    border: 0px;
    text-shadow: 0 1px rgba(0,0,0,0.3);
    background-color: #357ae8;
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

    /** Navbar CSS**/
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

    /** Login Button CSS **/
    .btn {
        background-color: #0A8E62;
        color: white;
        border: 0;
        margin-bottom: 0;
        margin-top: 8px;
        margin-left: 25px;
        margin-right: 15px;
        float:right;
    }
    .btn-group {
        float:right;
    }

    /** Footer CSS**/
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
    footer a {
        color: white;
    }
    footer a:hover {
        color: #0A8E62;
    }
    footer p {
        margin:0;
    }

    /** Body CSS**/
    * {
        margin: 0;
    }
    html, body {
        height: 100%;
    }
    .page-wrap {
        padding-top:70px;
        min-height: calc(100% - 50px);
    }
    .page-wrap:after {
        content: "";
        display: block;
    }
    .dropdown-menu {
        background-color: #333;
    }
    .dropdown-menu li a:hover, .dropdown-menu li.active a {
        color: #ffffff !important;
        background-color: #0A8E62 !important;
    }

    /** Logo CSS**/
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

<body data-spy="scroll" data-target=".navbar" data-offset="10" onload="content()">
<!--Navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header pull-left">
        <!--logo-->
            <img src="logo/logo.png" class="logo"> FridgeMates
        </div>
        <div class="navbar-header navbar-right">
            <!--hamburger menu button-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <?php
                if(isset($_SESSION['USER_ID']) &&
                (trim($_SESSION['USER_ID']) != '')) {
                    echo '<div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="margin-left:25px">'.$_SESSION["USER_NAME"].'</button>
                              <ul class="dropdown-menu">
                                  <li><a href="#">ACCOUNT</a></li>
                                  <li><a href="logout.php">LOGOUT</a></li>
                              </ul></div>';
                }
                else {
                    echo '<button type="button" class="btn" data-toggle="modal" data-target="#login-modal">Log In</button>';
                }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">HOME</a></li>
                <?php
                    if(isset($_SESSION['USER_ID']) &&
                    (trim($_SESSION['USER_ID']) != '')) {
                        echo '<li><a href="fridge.php">MY FRIDGES</a></li>';
                    }
                ?>
                <li><a href="affiliate.php">AFFILIATES</a></li>
                <li><a href="#bg3">ABOUT US</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--Login Modal-->
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

<!--body-->
<div id="content" class="page-wrap">
</div>

<!--footer-->
<footer class="site-footer">
    <a href="#">About Us</a> | <a href="affiliate.php">Affiliates</a> | <a href="#">Site Map</a>
    <p>Copyright &copy; 2017 FridgeMates </p>
</footer>
</body>
</html>