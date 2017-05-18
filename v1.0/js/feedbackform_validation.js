$('document').ready(function() {
    /* Validation of form */
    $("#feedback_form").validate({
        rules: {
            full_name: "required",

            email_address: {
                required:true,
                email:true
            },
            email_subject: "required",

            email_comment: "required"
        },
        messages: {
            full_name: "Please enter your name",

            email_address: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },

            email_subject: "Please select a subject",

            email_comment: "Please provide a comment"
        }, /* Validation ends */

        /* submit Ajax request  */
        submitHandler: function(form) {
          $.ajax({
                 type: "POST",
                 url: "email.php",
                 data: $("#feedback_form").serialize(),

                 // Success Response
                 success: function(response) {
                    $('.success').html(response);
                 },

                 // Error Response
                 error: function (jqXHR, exception) {
                    var error_msg = '';
                    if (jqXHR.status === 0) {
                        error_msg = 'Not connected. Verify your Network.';
                    } else if (jqXHR.status == 404) {
                        error_msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        error_msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        error_msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        error_msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        error_msg = 'Ajax request aborted.';
                    } else {
                        error_msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('.error').html(error_message);
                },

          }); /* Ajax request ends */
        }
    });
});
