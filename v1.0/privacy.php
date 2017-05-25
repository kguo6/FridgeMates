<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
<title>FridgeMates-Privacy Statement</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/loginmodal.css">
<link rel="stylesheet" href="css/headerfooter.css">
<link rel="stylesheet" href="css/privacy&tos.css">
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
                    <h1>Register a New Account</h1>
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
                    <h1>Login to Your Account</h1>
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
      <div class="container">
		     <div class="panel">
          <div class="panel-heading text-center">
						<h1>Privacy Statement</h1>
					</div>
          <div class="panel-body">

            <!-- Information Section -->
						<h3>Section 1 - What do we do with your Information?</h3>
            <hr>
  						<p>When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.</p>
  						<p>When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system. </p>
  						<p>Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates. </p>

            <!-- Consent Section -->
						<h3>Section 2 - Consent</h3>
            <hr>
  						<h4>How do you get my consent?</h4>
    						<p>When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.</p>
    						<p>If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no. </p>

						  <h4>How do I withdraw my consent?</h4>
						    <p>If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at support@fridgemates.ca or mailing us at: FridgeMates </p>

            <!-- Services Section -->
						<h3>Section 3 - Third-Party Services</h3>
            <hr>
  						<p>In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.
  						<p>However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.</p>
  						<p>For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.</p>
  						<p>In particular, remember that certain providers may be located in or have facilities that are located in a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.</p>
  						<p>As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.</p>
  						<p>Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service. </p>

  						<h4>Using our Links</h4>
  						  <p>When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements. </p>

            <!-- Security Section -->
						<h3>Section 4 - Security</h3>
            <hr>
  						<p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.</p>
  						<p>If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption.</p>
              <p>Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>

            <!-- Consent Section -->
						<h3>Section 5 - Age Of Consent</h3>
            <hr>
						  <p>By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>

            <!-- Privacy Section -->
						<h3>Section 6 - Changes To This Privacy Policy</h3>
            <hr>
  						<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</p>
  						<p>If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you. </p>

            <!-- Questions Section -->
						<h3>Questions And Contact Information</h3>
            <hr>
						  <p>If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at <span class = "hyper">support@fridgemates.ca </span></p>

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
