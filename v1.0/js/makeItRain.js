$.fn.makeItRain = function(){

		$(this).on('click',function(){

		    var maxFood = 10;
			var maxBills = 30;

			if(counter == 4) {

                for (var i = 0; i < maxBills; i++) {

                    var random = $(window).width();

                    var randomPosition = Math.floor((random - 150) * Math.random());
                    var randomTime = Math.random() * 10;
                    var randomSpeed = (Math.random() * 10) + 10;
                    // food
                    if (i < maxFood) {
                        var chicken = $("<span class='foodFoodFood'>")
                            .css({
                                left: randomPosition,
                                top: '-150px',
                                "-webkit-animation-delay": randomTime + 2 + "s",
                                "-webkit-animation-duration": 7 + "s"
                            });
                        $(chicken).prepend('<img class = fallingstuff style ="width:80px;"src="images/chicken.svg" alt="leftover chicken">');

                        $('body').append(chicken);

                    }

                    // bills
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
                
                counter++;  // increments clicks on item
			}
			$('.fallingstuff').on("click", function(){
				$(this).hide();

            }); // function that hides items

		}); //end for loop


	}; //end make it rain fn.

	// thanks to Anisha Varghese from the Noun Project for the SVG!!

