<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <title>FridgeMates-Support</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginmodal.css">
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel = "stylesheet" href = "css/support.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/register-validate.js"></script>
    <script src="js/login-validate.js"></script>
    <script src = "js/feedbackform_validation.js"></script>
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
      <div class = "container-fluid ">
        <!-- Jumbotron -->
        <div class="jumbotron text-center">
            <h1>Support</h1>
            <p>Got a question? Need a hand? Check us out </p>
        </div>
      </div>
        <!-- Frequently Asked Questions Section -->
        <div class = "faq">
            <h1> F.A.Q. </h1>
              <div class = "panel-group" id = "accordian">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Q: How do I add users to a Fridge?</a>
                        </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Q: How do I remove a fridge?</a>
                      </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Q: How do I leave a fridge that I'm in charge of?</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- Contact Us Section -->
        <div class = "contactus">
            <h1> Contact Us </h1>
              <div class = "contactus-container">
                <div class = "col-sm-6 contactus-text">
                  <div>
                    <h3> Our Address </h3>
                    <p>3700 Willingdon Ave</p>
                    <p>Burnaby, BC V5G 3H2</p>
                    <p>Email Address: <a href = "mailto:support@fridgemates.ca">support@fridgemates.ca</a></p>
                  </div>
                  <div class = "contact-spacer">
                    <h3> Call Us </h3>
                    <p> Can't find what you're looking for? </p>
                    <p> Call us at: <a href = "tel:+180012345678">1-800-1234-5678</a></p>
                  </div>
                </div>
                <div class = "col-sm-6 contactus-text">
                  <iframe width="100%" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?zoom=17&center=49.2485%2C-123.0012&key=AIzaSyCvihikGmS-UcFAkBvo1DRQvd7Vo_rw3wA" allowfullscreen></iframe>
                </div>
              </div>
            <div>

                <!-- Feedback Form Secion -->
                <form method = "post" id = "feedback_form">
                  <fieldset>
                    <legend> Send Us Your Feedback</legend>
                    <div class = "form-group row ">
                      <label for = "name" class = "col-sm-3 col-form-label">Name:</label>
                      <div class = "col-sm-9">
                        <input class="form-control" type = "text" name = "full_name" id = "name" maxlength = "100" >
                      </div>
                    </div>
                    <div class = "form-group row">
                      <label for = "emailaddress" class = "col-sm-3 col-form-label">Email Address: </label>
                      <div class = "col-sm-9">
                        <input class="form-control" type = "email" name = "email_address" id = "emailaddress" maxlength = "100">
                      </div>
                    </div>
                    <div class = "form-group row">
                      <label for = "subject" class = "col-sm-3 col-form-label"> Subject: </label>
                      <div class = "col-sm-9">
                        <select class="form-control" name="email_subject" id = "emailsubject" >
                          <option disabled selected value> -- select an option -- </option>
                          <option value="Product Questions">Product Questions</option>
                          <option value="Bug Report">Bug Report</option>
                          <option value="Customer Service">Feedback</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class = "form-group row">
                      <label  for = "comment" class = "col-sm-3 col-form-label">Comment:</label>
                      <div class = "col-sm-9">
                        <textarea class="form-control" rows="3" cols="50" name="email_comment" id = "emailcomment"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-offset-3 col-sm-9">
                        <!-- Success Message -->
                        <div class = "success">
                          <button type="submit" class = "btn btn-primary" name = "submit">Submit</button>
                          <!-- Error Message -->
                          <div class = "error"></div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <a href="about.php">About Us</a> | <a href="tos.php">Terms</a> | <a href="privacy.php">Privacy</a>
        <p>Copyright <span id="click">&copy;</span> 2017 FridgeMates </p>
        <div class="fb-like" data-href="https://www.facebook.com/fridgemates" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
    </footer>
</body>
</html>
