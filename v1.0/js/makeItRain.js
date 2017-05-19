$.fn.makeItRain = function(){

		$(this).on('click',function(){

		    var maxFood = 10;
			var maxBills = 20;

			if(counter == 4) {

                for (var i = 0; i < maxBills; i++) {

                    var random = $(window).width();

                    var randomPosition = Math.floor((random - 150) * Math.random());
                    var randomTime = Math.random() * 10;
                    var randomSpeed = (Math.random() * 10) + 10;

                    if(i == 19){
                        position = random - random*0.5;
                        randomTime = Math.random() * 10;
                        randomSpeed = (Math.random() * 10) + 10;

                        var chris = $("<span class='faceFaceFace'>")
                            .css({
                                left: position,
                                top: '-150px',
                                "-webkit-animation-delay": 10 + "s",
                                "-webkit-animation-duration": 10 + "s"
                            });
                        $(chris).prepend('<img class = fallingstuff style ="width:100px;"src="images/chris.png" alt="chris">');

                        $('body').append(chris);
                        position = random - random *0.9;
                        randomTime = Math.random() * 10;
                        randomSpeed = (Math.random() * 10) + 10;
                        var carly = $("<span class='faceFaceFace'>")
                            .css({
                                left: position,
                                top: '-150px',
                                "-webkit-animation-delay": 10 + "s",
                                "-webkit-animation-duration": 10 + "s"
                            });
                        $(carly).prepend('<img class = fallingstuff style ="width:80px;"src="images/carly.png" alt="carly">');

                        $('body').append(carly);
                    }
                    if (i < maxFood) {
                        randomPosition = Math.floor((random - 150) * Math.random());
                        randomTime = Math.random() * 10;
                        randomSpeed = (Math.random() * 10) + 10;
                        var chicken = $("<span class='foodFoodFood'>")
                            .css({
                                left: randomPosition,
                                top: '-150px',
                                "-webkit-animation-delay": randomTime + 2 + "s",
                                "-webkit-animation-duration": 6 + "s"
                            });
                        $(chicken).prepend('<img class = fallingstuff style ="width:80px;"src="images/chicken.svg" alt="leftover chicken">');

                        $('body').append(chicken);
                   }

                    randomPosition = Math.floor((random - 150) * Math.random());
                    randomTime = Math.random() * 10;
                    randomSpeed = (Math.random() * 10) + 10;
                    var bills = $("<span class='billsBillsBills'>")
                        .css({
                            left: randomPosition,
                            top: '-150px',
                            "-webkit-animation-delay": randomTime + "s",
                            "-webkit-animation-duration": randomSpeed + "s"

                        });

                    $(bills).prepend('<img class = fallingstuff style ="width:80px;"src="images/bills.svg" alt="a dollar bill">');


                    $('body').append(bills);



                }; // end click function
                counter++;
			}
			$('.fallingstuff').on("click", function(){
				$(this).hide();

            }); // function that hides items

		}); //end for loop


	}; //end make it rain fn.

	// thanks to Anisha Varghese from the Noun Project for the SVG!!

