$().ready(function() {
    $('#addItemForm').validate({
        rules: {
            item_name: {
                required: true,
                maxlength: 40
            },
            item_comment: {
                maxlength: 160
            }
        },
        messages: {
            item_name: {
                required: "Please enter an item name",
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
       