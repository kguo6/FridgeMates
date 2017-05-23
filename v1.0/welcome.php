<?php

    session_start();

?>

<div class="container-fluid" id="welcome-container">
    <!-- welcome user jumbotron -->
    <div class="jumbotron" id="welcome-header">
        <h1>Welcome <?php echo $_SESSION['USER_NAME'] ?></h1>
    </div>
    <!-- top row of buttons -->
    <div class="row">
        <div class="col-xs-5 visible-xs">
            <a href="fridge.php"><div class="button_left"><span class="glyphicon glyphicon-apple icon_mobile"></span><p class="text_mobile">FRIDGES</p></div></a>
        </div>
        <div class="col-xs-2 visible-xs"></div>
        <div class="col-xs-5 visible-xs">
            <a href="account.php"><div class="button_right"><span class="glyphicon glyphicon-user icon_mobile"></span><p class="text_mobile">ACCOUNT</p></div></a>
        </div>
    </div>
    <!-- bottom row of buttons -->
    <div class="row">
        <div class="col-xs-5 visible-xs">
            <a href="affiliate.php"><div class="button_left"><span class="glyphicon glyphicon-info-sign icon_mobile"></span><p class="text_mobile">AFFILIATES</p></div></a>
        </div>
        <div class="col-xs-2 visible-xs"></div>
        <div class="col-xs-5 visible-xs">
            <a href="support.php"><div class="button_right"><span class="glyphicon glyphicon-comment icon_mobile"></span><p class="text_mobile">SUPPORT</p></div></a>
        </div>
    </div>
    <!-- icon display for desktop view -->
    <div class="row desktop">
        <div class="col-xs-6 col-md-3">
            <a href="fridge.php"><div class="visible-lg visible-md visible-sm button_desktop"><span class="glyphicon glyphicon-apple icon_desktop"></span><p class="text_desktop">FRIDGES</p></div></a>
        </div>


        <div class="col-xs-6 col-md-3">
            <a href="account.php"><div class="visible-lg visible-md visible-sm button_desktop"><span class="glyphicon glyphicon-user icon_desktop"></span><p class="text_desktop">ACCOUNT</p></div></a>
        </div>

        <div class="col-xs-6 col-md-3">
            <a href="affiliate.php"><div class="visible-lg visible-md visible-sm button_desktop"><span class="glyphicon glyphicon-info-sign icon_desktop"></span><p class="text_desktop">AFFILIATES</p></div></a>
        </div>

        <div class="col-xs-6 col-md-3">
            <a href="support.php"><div class="visible-lg visible-md visible-sm button_desktop"><span class="glyphicon glyphicon-comment icon_desktop"></span><p class="text_desktop">SUPPORT</p></div></a>
        </div>
    </div>

</div>