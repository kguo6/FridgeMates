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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
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
                          }
                      };
                      xhttp.open("GET", "loginform.php", true);
                      xhttp.send();';
            }
        ?>
    }
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
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="10" onload="content();login();">
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
    </div>
    <!-- footer -->
    <footer>
        <a href="about.php">About Us</a> | <a href="sitemap.php">Site Map</a>
        <p>Copyright &copy; 2017 FridgeMates </p>
    </footer>
</body>
</html>