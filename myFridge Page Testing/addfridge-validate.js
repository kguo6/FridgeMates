$().ready(function() {
    $('#addFridgeForm').validate({
        rules: {
            fridge_name: {
                required: true,
            }
        },
        messages: {
            fridge_name: {
                required: "Please enter a fridge name"
            }
        },
        submitHandler: submitLogin
    });
    function submitLogin() {
        var data = $("#addFridgeForm").serialize();
        $.ajax({
            type : 'POST',
            url  : 'createFridge.php',
            data : data,
            success: function(data) {
                if(data == 1) {
                    $("#addFridgeResponse").html('<p style="text-align:center">Fridge Added</p><br><a href="#" onclick="showAddFridge()">Back</a>');
                    $("#addFridgeResponse").show();
                    $("#addFridgeForm").hide();
                    $("#addFridgeButtons").hide();
                    location.reload();
                }
                else {
                    $("#addFridgeResponse").html('<p style="text-align:center">Error Creating Fridge</p><br><a href="#" onclick="showAddFridge()">Back</a>');
                    $("#addFridgeResponse").show();
                    $("#addFridgeForm").hide();
                    $("#addFridgeButtons").hide();
                }   
            }
        });
        return false;
    }
});
       