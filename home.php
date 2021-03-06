<?php

    session_start();

?>

<!-- title info card -->
<div class="container-fluid card_one">
    <div class="jumbotron" id="prelogin_jumbotron">
        <h1>FridgeMates</h1>
        <p>Sharing is caring.</p>
    </div>
</div>
<!-- fridgemate webapp info card -->
<div class="container-fluid card_intro">
    <h2 id="introtitle">Making a Splash</h2>
    <p class="join_txt">FridgeMates is a small start up company that has entered the fray to solve global food waste. Our web application allows users to share food and leftover items in a shared fridge.</p>

    <p class="join_txt">By becoming a Fridge Leader in your community, you can contribute to the reduction of food waste and help promote environmentally sustainable behavior. Furthermore, FridgeMates hopes to bring individual communities closer together by sharing food.</p>

    <h4>Join us today and help us fight this global issue.</h4>

    <button type="button" class="btn btn-primary lmore_btn join_btn" data-toggle="modal" data-target="#login-modal" onclick="register()">Start Sharing!</button>
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
                    <div class="page"><img src="./logo/screenshot1.png" height="322" width="180"></div>
                    <div class="page"><img src="./logo/screenshot2.png" height="322" width="180"></div>
                    <div class="page"><img src="./logo/screenshot3.png" height="322" width="180"></div>
                    <div class="page"><img src="./logo/screenshot4.png" height="322" width="180"></div>
                    <div class="page"><img src="./logo/screenshot5.png" height="322" width="180"></div>
                </div>
            </div>
            </div>

            <!-- list describing the screenshots in desktop-->
            <div class="col-sm-9">
                <div id="slider" class="description visible-sm visible-md visible-lg">
                    <ul>
                        <li class='active'> FridgeMates feature simple and intuitive UI that concentrates on user experience!</li>
                        <li>Add items that you want to share with your community!</li>
                        <li>FridgeMates allows you to pass authorization to other users!</li>
                        <li>The fridge icon allows you to switch between fridge quickly and simply!</li>
                        <li>Someone is sharing leftover pizza and mashed potatoes inside of the fridge!</li>
                    </ul>
                </div>

                <!-- list describing the screenshots in mobile -->
                <div id="slider_mobile" class="description visible-xs">
                    <ul>
                        <li class='active'> FridgeMates feature simple and intuitive UI that concentrates on user experience!</li>
                        <li>Add items that you want to share with your community!</li>
                        <li>FridgeMates allows you to pass authorization to other users!</li>
                        <li>The fridge icon allows you to switch between fridge quickly and simply!</li>
                        <li>Someone is sharing leftover pizza and mashed potatoes inside of the fridge!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- feature cards telling visitors what our app can do -->
<div class="container-fluid" id="feature_cards">
    <div class="col-sm-4 card_two">
        <h3 class="promo_text">Know what is in your Fridge?</h3>
        <hr class="card_one_line">
        <p>Keep track of items in your fridge that you share with others! FridgeMates can let you know what food is in your fridge, how long its been sitting there and can even track who has been eating what.
</p>
    </div>
    <div class="col-sm-4 card_two">
        <h3 class="promo_text" id="promo2">Sharing a Fridge with Roommates?</h3>
        <hr class="card_one_line">
        <p>Always wondering what can be eaten? Don't fret! FridgeMates is here to let you and your
            fridgemate know what food is available for eating!</p>
    </div>
    <div class="col-sm-4 card_two">
        <h3 class="promo_text">Get to know your Community!</h3>
        <hr class="card_one_line">
        <p>Are you new to the office? Get to know new people and make new friends that you can connect with over delicious food! Or why not become a Fridge Leader and start bringing your community closer together. 

    </div>
</div>

<!-- affiliate info card -->
<div class="container-fluid card_four">
    <div class="row">
        <div class="col-sm-5" id="test">
            <img src="./logo/affiliateslogos.png" alt="affiliate logo" id="afflogo">
        </div>
        <div class="col-sm-7">
            <h3 class="introtitle">Our Partners</h3>
            <p>We have partnered up with some of the greatest apps to bring you The Green Thumb Initiative. The Green Thumb Initiative, is a partnership program whose ultimate goal is to reduce food waste on a global scale.

            </p>
            <!-- hidden learn more button when in mobile resolution -->
            <a href="affiliate.php"><button type="button" class="btn btn-primary hidden-xs lmore_btn">Learn More</button></a>
        </div>

        <!-- hidden learn more button when in tablet resolution or higher -->
        <a href="affiliate.php"><button type="button" class="btn btn-primary hidden-sm hidden-md hidden-lg lmore_btn">Learn More</button></a>
    </div>
</div>

