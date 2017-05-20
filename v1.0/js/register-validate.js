$().ready(function() {
    $.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");

    $.validator.addMethod( "nowhitespace", function( value, element ) {
        return this.optional( element ) || /^\S+$/i.test( value );
    }, "No white space please" );

    $('#registerForm').validate({
        rules: {
            register_username: {
                required: true,
                email: true
            },
            register_password: {
                required: true,
                nowhitespace: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                equalTo: "#register_password"
            },
            register_name: {
                required: true,
                noSpace: true,
                minlength: 2
            }
        },
        messages: {
            register_username: {
                required: "Please enter your email",
                email: "Please enter a valid email"
            },
            register_password: {
                required: "Please enter a password",
                nowhitespace: "Please enter a valid password",
                minlength: "Your password must be at least 6 characters"
            },
            confirm_password: {
                required: "Please confirm your password",
                equalTo: "Please make sure your password matches"
            },
            register_name: {
                required: "Please enter a username",
                noSpace: "Please enter a valid username",
                minlength: "Your username must be at least 2 characters"
            }
        },
        submitHandler: submitRegister
    });
    function submitRegister() {
        var data = $("#registerForm").serialize();
        $.ajax({
            type : 'POST',
            url  : 'register.php',
            data : data,
            success: function(data) {
                if(data == 1) {
                    $("#errorContainer").html('<p style="text-align:center">User Already Exists</p><br><a href="#" onclick="register()">Back</a>');
                    $("#errorContainer").show();
                    $("#registerContainer").hide();
                    $("#loginContainer").hide();
                }
                else if (data == 2) {
                    $("#errorContainer").html('<p style="text-align:center">Registration Successful</p><br><a href="#" onclick="login()">Login</a>');
                    $("#errorContainer").show();
                    $("#registerContainer").hide();
                    $("#loginContainer").hide();
                }
                else {
                    $("#errorContainer").html('<p style="text-align:center">Registration Error</p><br><a href="#" onclick="register()">Back</a>');
                    $("#errorContainer").show();
                    $("#registerContainer").hide();
                    $("#loginContainer").hide();
                }   
            }
        });
        return false;
    }
});
       