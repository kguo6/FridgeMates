$().ready(function() {
    $('#loginForm').validate({
        rules: {
            login_username: {
                required: true,
                email: true
            },
            login_password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            login_username: {
                required: "Please enter your email",
                email: "Please enter a valid email"
            },
            login_password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters"
            }
        },
        submitHandler: submitLogin
    });
    function submitLogin() {
        var data = $("#loginForm").serialize();
        $.ajax({
            type : 'POST',
            url  : 'login.php',
            data : data,
            success: function(data) {
                if(data == 1) {
                    $("#errorContainer").html('<p style="text-align:center">Login Error</p><br><a href="#" onclick="login()">Back</a>');
                    $("#errorContainer").show();
                    $("#registerContainer").hide();
                    $("#loginContainer").hide();
                }
                else {
                    location.reload();
                }   
            }
        });
        return false;
    }
});
       