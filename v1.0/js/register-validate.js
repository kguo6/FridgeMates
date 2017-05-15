$().ready(function() {
                $('#registerForm').validate({
                    rules: {
                        register_username: {
                            required: true,
                            email: true
                        },
                        register_password: {
                            required: true,
                            minlength: 6
                        },
                        confirm_password: {
                            required: true,
                            minlength: 6,
                            equalTo: "#register_password"
                        },
                        register_name: {
                            required: true,
                            minlength: 4
                        }
                    },
                    messages: {
                        register_username: {
                            required: "Please enter your email",
                            email: "Please enter a valid email"
                        },
                        register_password: {
                            required: "Please enter a password",
                            minlength: "Your password must be at least 6 characters"
                        },
                        confirm_password: {
                            required: "Please confirm your password",
                            minlength: "Your password must be at least 6 characters",
                            equalTo: "Please make sure your password matches"
                        },
                        register_name: {
                            required: "Please enter a username",
                            minlength: "Your username must be at least 4 characters"
                        }
                    }
        });
    });
       