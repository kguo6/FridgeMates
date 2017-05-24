<?php

    session_start();

?>

<!-- title info card -->
<div class="container-fluid card_one">
    <div class="jumbotron">
        <h1>FridgeMates</h1>
        <p>Sharing is caring.</p>
    </div>
</div>
<!-- fridgemate webapp info card -->
<div class="container-fluid card_intro">
    <h2>TEST</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<!-- iphone screenshot demo info card -->
<div class="container-fluid card_three">
    <div class="row">
    <div class="col-sm-3" id="iphone">
    <!-- iphone mockup wireframe -->
    <img src="./logo/iphone.png">
    <!-- where the screenshots will cycle  -->
    <div class="mask">
        <!-- what is shown in the mask-->
        <div class="canvas">
            <div class="page"><img src="./logo/test.png" height="322" width="188"></div>
            <div class="page"><img src="./logo/test2.png" height="322" width="188"></div>
            <div class="page"><img src="./logo/test.png" height="322" width="188"></div>
            <div class="page"><img src="./logo/test2.png" height="322" width="188"></div>
            <div class="page"><img src="./logo/test2.png" height="322" width="188"></div>
        </div>
    </div>
    </div>
    <div class="col-sm-9">
        <div id="slider" class="description visible-sm visible-md visible-lg">
            <ul>
                <li class='active'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </li>

            </ul>
    </div>
    </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-sm-4 card_two">
        <h3>Know what is in your Fridge?</h3>
        <hr class="card_one_line">
        <p>Keep track of items that are in your fridge that you
            share with your family!  FridgeMates can let you know
            what food is in your fridge and how long it's been sitting in there.</p>
    </div>
    <div class="col-sm-4 card_two">
        <h3>Sharing a Fridge with Roommates?</h3>
        <hr class="card_one_line">
        <p>Always wondering what can be eaten? Don't fret! FridgeMates is here to let you and your
            fridgemate know what food is available for eating!</p>
    </div>
    <div class="col-sm-4 card_two">
        <h3>Get to know your Community!</h3>
        <hr class="card_one_line">
        <p>Are you new to the office? Make new friends and connect with them over delicious food!
    </div>
</div>

<!-- affiliate info card -->
<div class="container-fluid card_four">
    <div class="row">
        <div class="col-sm-5" id="test">
            <img src="./logo/affiliateslogos.png" alt="affiliate logo" id="afflogo">
        </div>
        <div class="col-sm-7">
            <h3>Our Partners</h3>
            <p>We have partnered up with some great people to help reduce food waste.
                In concert with FridgeMates, we have developed a four-step preventative
                measure in preventing wasting food.
            </p>
            <!-- hidden learn more button when in mobile resolution -->
            <a href="affiliate.php"><button type="button" class="btn btn-primary hidden-xs lmore_btn">Learn More</button></a>
        </div>

        <!-- hidden learn more button when in tablet resolution or higher -->
        <a href="affiliate.php"><button type="button" class="btn btn-primary hidden-sm hidden-md hidden-lg lmore_btn">Learn More</button></a>
    </div>
</div>

