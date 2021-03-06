<?php
    session_start();

    require_once("config.php");
    $user_id = $_SESSION["USER_ID"];
    $query="SELECT fridge_name, Fridges.fridge_id FROM Fridges JOIN Auth_Users ON Fridges.fridge_id = Auth_Users.fridge_id
                        WHERE authorized = 'Yes' && user_id = '".$user_id."'";
    $response = @mysqli_query($dbc, $query);
    $fridge = mysqli_fetch_assoc($response);
    if(isset($fridge['fridge_id'])) {
        $_SESSION['FRIDGE_ID'] = $fridge['fridge_id'];
        $_SESSION['HAS_FRIDGE'] = 1;
    }
    else {
        $_SESSION['HAS_FRIDGE'] = 0;
    }
?>

<!doctype html>
<html lang="en">
<head>
<title>FridgeMates-My Fridges</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/fridgefab.css">
<link rel="stylesheet" href="css/loginmodal.css">
<link rel="stylesheet" href="css/headerfooter.css">
<link rel="stylesheet" href="css/addfridgemodal.css">
<link rel="stylesheet" href="css/additem.css">
<link rel="stylesheet" href="css/adduser.css">
<link rel="stylesheet" href="css/myfridge.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/register-validate.js"></script>
<script src="js/login-validate.js"></script>
<script src="js/addfridge-validate.js"></script>
<script src="js/additem-validate.js"></script>
<script src="js/adduser-validate.js"></script>
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
    //toggle function for fridge fab
    function fridges(event) {
        if($('#fabNav').css('display') == "none"){
            document.getElementById("fabNav").style.display = "block";
        }
        else if($('#fabNav').css('display') == "block"){
            document.getElementById("fabNav").style.display = "none";
        }
        event.stopPropagation();
    }
    //hides fridge fab
    function hidefab() {
        if(document.getElementById("fabNav").style.display == "block"){
            document.getElementById("fabNav").style.display = "none";
        }
    }
    //resets the add fridge modal
    function showAddFridge() {
        document.getElementById("addFridgeForm").reset();
        document.getElementById("addFridgeForm").style.display = "block";
        document.getElementById("addFridgeButtons").style.display = "block";
        document.getElementById("addFridgeResponse").style.display = "none";
    }
    //loads the fridge on page using ajax
    function getfridges(fridge) {
        window.fridge_id = fridge;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "myfridges.php?fridge_id=" + fridge_id, true);
        xhttp.send();
    }
    //reloads the current fridge on page using ajax
    function reloadfridges() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "myfridges.php?fridge_id=" + window.fridge_id, true);
        xhttp.send();
    }
    //reloads the current fridge's manage tab on page using ajax
    function reloadmanage() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
                $('#managetab').tab("show");
            }
        };
        xhttp.open("GET", "myfridges.php?fridge_id=" + window.fridge_id, true);
        xhttp.send();
    }
    //deletes item
    function deleteItem(item_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                reloadfridges();
            }
        };
        xhttp.open("GET", "deleteItem.php?item_id=" + item_id, true);
        xhttp.send();
    }
    //deletes user
    function deleteUser(user_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                reloadmanage();
            }
        };
        xhttp.open("GET", "deleteUser.php?user_id=" + user_id, true);
        xhttp.send();
    }
    //passes authority to new user
    function passAuthority(user_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                reloadmanage();
            }
        };
        xhttp.open("GET", "promoteUser.php?user_id=" + user_id, true);
        xhttp.send();
    }
    //allows owner to delete fridge
    function deleteFridge() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "deleteFridge.php", true);
        xhttp.send();
    }
    //allows user to leave fridge
    function leaveFridge() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "leaveFridge.php", true);
        xhttp.send();
    }
    //resets the add item modal
    function showAddItem() {
        document.getElementById("addItemForm").reset();
        document.getElementById("addItemForm").style.display = "block";
        document.getElementById("addItemButtons").style.display = "block";
        document.getElementById("addItemResponse").style.display = "none";
    }
    //resets the add user modal
    function showAddUser() {
        document.getElementById("addUserForm").reset();
        document.getElementById("addUserForm").style.display = "block";
        document.getElementById("addUserButtons").style.display = "block";
        document.getElementById("addUserResponse").style.display = "none";
    }
    //open make fridge modal if no fridges exist
    function firstFridge() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "nofridge.html", true);
        xhttp.send();
    }
    //loads corresponding item information in item modal
    function showItem(item_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("itemModal").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "item.php?item_id=" + item_id, true);
        xhttp.send();
    }
</script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="10" onclick="hidefab()" onload="login();<?php if($_SESSION['HAS_FRIDGE'] == 1) { echo 'getfridges('.$_SESSION['FRIDGE_ID'].');';} else { echo 'firstFridge();';}?>">
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
    <!-- floating action button for fridge selection -->
    <div id="fabContainer">
        <button id="fabButton" onclick="fridges(event)"></button>
        <nav id="fabNav">
            <?php
                require_once("config.php");
                $user_id = $_SESSION["USER_ID"];
                $query="SELECT fridge_name, Fridges.fridge_id FROM Fridges JOIN Auth_Users ON Fridges.fridge_id = Auth_Users.fridge_id
                                    WHERE authorized = 'Yes' && user_id = '".$user_id."'";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)) {
                    echo '<a href="#" onclick="getfridges('.$row['fridge_id'].');">'.$row['fridge_name'].'</a>';
                }
                echo '<a href="#" data-toggle="modal" data-target="#addFridgeModal" onclick="showAddFridge();">ADD FRIDGE</a>';
            ?>
        </nav>
    </div>
    <!-- add fridge modal -->
    <div id="addFridgeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="addFridgeHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Fridge</h4>
                </div>
                <div class="modal-body" id="addFridgeBody">
                    <form method="post" id="addFridgeForm">
                        <label for="fridge_name" id="fridgeNameLabel">
                            Fridge Name:
                        </label>
                        <br>
                        <input type="text" name="fridge_name" id="fridge_name">
                    </form>
                    <div id="addFridgeResponse"></div>
                </div>
                <div class="modal-footer" id="addFridgeButtons">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="addFridgeForm" class="btn btn-default">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- add item modal -->
    <div id="addItemModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="addItemHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Item</h4>
                </div>
                <div class="modal-body" id="addItemBody">
                    <form method="post" id="addItemForm">
                        <label for="item_name" id="fridgeItemLabel">
                            Item:
                        </label>
                        <br>
                        <input type="text" name="item_name" id="item_name">
                        <br>
                        <label for="item_comment" id="fridgeItemCommentLabel">
                            Comment:
                        </label>
                        <br>
                        <textarea name="item_comment" id="item_comment" style="resize:none"></textarea>
                    </form>
                    <div id="addItemResponse"></div>
                </div>
                <div class="modal-footer" id="addItemButtons">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="addItemForm" class="btn btn-default">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- add user modal -->
    <div id="addUserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="addUserHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body" id="addUserBody">
                    <form method="post" id="addUserForm">
                        <label for="email" id="userLabel">
                            Email:
                        </label>
                        <br>
                        <input type="text" name="email" id="email">
                    </form>
                    <div id="addUserResponse"></div>
                </div>
                <div class="modal-footer" id="addUserButtons">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="addUserForm" class="btn btn-default">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete fridge modal -->
    <div id="deleteFridgeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="deleteFridgeHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Fridge Confirmation</h4>
                </div>
                <div class="modal-body" id="deleteFridgeBody">
                    Are you sure you want to delete this fridge?
                </div>
                <div class="modal-footer" id="deleteFridgeButtons">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-default" onclick="deleteFridge()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- leave fridge modal -->
    <div id="leaveFridgeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="leaveFridgeHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Leave Fridge Confirmation</h4>
                </div>
                <div class="modal-body" id="leaveFridgeBody">
                    Are you sure you want to leave this fridge?
                </div>
                <div class="modal-footer" id="leaveFridgeButtons">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-default" onclick="leaveFridge()">Leave</button>
                </div>
            </div>
        </div>
    </div>
    <!-- item modal -->
    <div id="itemModal" class="modal fade" role="dialog">
    </div>
    <!-- footer -->
    <footer>
        <a href="about.php">About Us</a> | <a href="tos.php">Terms</a> | <a href="privacy.php">Privacy</a>
        <p>Copyright <span id="click">&copy;</span> 2017 FridgeMates </p>
        <div class="fb-like" data-href="https://www.facebook.com/fridgemates" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
    </footer>
</body>
</html>