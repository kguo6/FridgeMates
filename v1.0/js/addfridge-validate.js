$().ready(function() {
    $.validator.addMethod("noSpace", function(value, element) { 
        return value.trim() != ""; 
    }, "No space please and don't leave it empty");

    $('#addFridgeForm').validate({
        rules: {
            fridge_name: {
                required: true,
                noSpace: true,
                maxlength: 15
            }
        },
        messages: {
            fridge_name: {
                required: "Please enter a fridge name",
                noSpace: "Please enter a valid fridge name",
                maxlength: "Maximum length is 15 characters"
            }
        },
        submitHandler: submitAddFridge
    });
    function submitAddFridge() {
        var data = $("#addFridgeForm").serialize();
        $.ajax({
            type : 'POST',
            url  : 'createFridge.php',
            data : data,
            success: function(data) {
                if(data == 1) {
                    $("#addFridgeResponse").html('<p style="text-align:center">Fridge Added</p><br><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button><button type="button" class="btn btn-default pull-left" onclick="showAddFridge()"><img style="height:20px" src="logo/arrows.png"></button><div style="clear:both"></div>');
                    $("#addFridgeResponse").show();
                    $("#addFridgeForm").hide();
                    $("#addFridgeButtons").hide();
                    location.reload();
                }
                else {
                    $("#addFridgeResponse").html('<p style="text-align:center">Error Creating Fridge</p><br><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button><button type="button" class="btn btn-default pull-left" onclick="showAddFridge()"><img style="height:20px" src="logo/arrows.png"></button><div style="clear:both"></div>');
                    $("#addFridgeResponse").show();
                    $("#addFridgeForm").hide();
                    $("#addFridgeButtons").hide();
                }   
            }
        });
        return false;
    }
});
       