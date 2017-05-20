<?php

    session_start();

?>

    <div class="container-fluid">
        <!-- welcome user jumbotron -->
        <div class="jumbotron">
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
</div>
</div>