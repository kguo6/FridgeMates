$().ready(function() {
    $.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");

    $('#addItemForm').validate({
        rules: {
            item_name: {
                required: true,
                noSpace: true,
                maxlength: 40
            },
            item_comment: {
                maxlength: 160
            }
        },
        messages: {
            item_name: {
                required: "Please enter an item name",
                noSpace: "Please enter a valid item name",
                maxlength: "Maximum length is 40 characters"
            },
            item_comment: {
                maxlength: "Comment can't exceed 160 characters"
            }
        },
        submitHandler: submitAddItem
    });
    function submitAddItem() {
        var data = $("#addItemForm").serialize();
        $.ajax({
            type : 'POST',
            url  : 'addItem.php',
            data : data,
            success: function(data) {
                if(data == 1) {
                    $("#addItemResponse").html('<p style="text-align:center">Item Added</p><br><a href="#" onclick="showAddItem()">Back</a>');
                    $("#addItemResponse").show();
                    $("#addItemForm").hide();
                    $("#addItemButtons").hide();
                    $("#content").load("myfridges.php?fridge_id=" + window.fridge_id);
                }
                else {
                    $("#addItemResponse").html('<p style="text-align:center">Error Adding Item</p><br><a href="#" onclick="showAddItem()">Back</a>');
                    $("#addItemResponse").show();
                    $("#addItemForm").hide();
                    $("#addItemButtons").hide();
                }   
            }
        });
        return false;
    }
});
       