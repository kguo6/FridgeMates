$().ready(function() {
    $('#addUserForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "Please enter an email",
                email: "Please enter a valid email"
            }
        },
        submitHandler: submitAddUser
    });
    function submitAddUser() {
        var data = $("#addUserForm").serialize();
        $.ajax({
            type : 'POST',
            url  : 'addUsers.php',
            data : data,
            success: function(data) {
                if(data == 1) {
                    $("#addUserResponse").html('<p style="text-align:center">User Added</p><br><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button><button type="button" class="btn btn-default pull-left" onclick="showAddUser()">Back</button><div style="clear:both"></div>');
                    $("#addUserResponse").show();
                    $("#addUserForm").hide();
                    $("#addUserButtons").hide();
                    $("#content").load("myfridges.php?fridge_id=" + window.fridge_id, function() {
                        $("#managetab").tab("show");
                    });

                }
                else if(data == 2) {
                    $("#addUserResponse").html('<p style="text-align:center">User Already Added</p><br><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button><button type="button" class="btn btn-default pull-left" onclick="showAddUser()">Back</button><div style="clear:both"></div>');
                    $("#addUserResponse").show();
                    $("#addUserForm").hide();
                    $("#addUserButtons").hide();
                }
                else if(data == 3) {
                    $("#addUserResponse").html('<p style="text-align:center">User Does Not Exist</p><br><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button><button type="button" class="btn btn-default pull-left" onclick="showAddUser()">Back</button><div style="clear:both"></div>');
                    $("#addUserResponse").show();
                    $("#addUserForm").hide();
                    $("#addUserButtons").hide();
                }
                else {
                    $("#addUserResponse").html('<p style="text-align:center">Error Adding User</p><br><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button><button type="button" class="btn btn-default pull-left" onclick="showAddUser()">Back</button><div style="clear:both"></div>');
                    $("#addUserResponse").show();
                    $("#addUserForm").hide();
                    $("#addUserButtons").hide();
                }   
            }
        });
        return false;
    }
});
       