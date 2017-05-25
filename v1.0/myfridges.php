<?php

    session_start();

    require_once("config.php");

    //sets timezone to Vancouver
    date_default_timezone_set("America/Vancouver");

    //retrieves user id and fridge id and sets current fridge id as session variable for other functions to use
    $user_id = $_SESSION["USER_ID"];
    $fridge_id = $_GET["fridge_id"];
    $_SESSION['FRIDGE_ID'] = $fridge_id;

    //checks if current user is creator of fridge 
    $query = "SELECT creator FROM Auth_Users WHERE fridge_id =".$fridge_id." && user_id =".$user_id;
    $response = @mysqli_query($dbc, $query);
    $authorization = mysqli_fetch_assoc($response);
    if($authorization['creator'] == 'Yes') {
        $creator = 'Yes';
    }
    else {
        $creator = 'No';
    }

    //queries for name of current fridge
    $query1 = "SELECT fridge_name FROM Fridges WHERE fridge_id =".$fridge_id;
    $response1 = @mysqli_query($dbc, $query1);
    $fridge = mysqli_fetch_assoc($response1);

    //echos out the fridge name for display on page and sets up page to be tabs
    echo '<h2>'.strtoupper($fridge['fridge_name']).'</h2>';
    echo '<ul class="nav nav-tabs">';
        echo '<li class="active"><a data-toggle="tab" href="#fridge" id="fridgetab">Fridge</a></li>';
        echo '<li><a data-toggle="tab" href="#manage" id="managetab">Manage</a></li>';
    echo '</ul>';
    echo '<div class="tab-content">';
        //the content of the fridge tab 
        echo '<div id="fridge" class="tab-pane fade in active">';

        //queries the items currently in the fridge
        $query2 = "SELECT * FROM Items WHERE deleted = 'No' && fridge_id = ".$fridge_id;
        $response2 = @mysqli_query($dbc, $query2);

        echo '<div id="fridgetabitems">Items:</div>';
        echo '<div id="fridgeitems">';
        while($row2 = mysqli_fetch_array($response2)) {

            $query5 = "SELECT item_date FROM Items WHERE item_id =".$row2['item_id'];
            $response5 = @mysqli_query($dbc, $query5);
            $date = mysqli_fetch_assoc($response5);

            //calculates how much time the item has been in the fridge and sets corresponding values for gradient to fade as time increases
            $delta_seconds = time() - strtotime($date['item_date']);

            $fresh_ratio = $delta_seconds / 302400; 

            $red = 202;
            $green = 244;
            $blue = 211;

            $red = $red + (int)(53 * $fresh_ratio);
            $green = $green + (int)(11 * $fresh_ratio);
            $blue = $blue + (int)(44 * $fresh_ratio);

            if($fresh_ratio > 1) {
                $fresh_ratio2 = ($delta_seconds - 302400) / 302400; 
            }
            else {
                $fresh_ratio2 = 0; 
            }

            $red2 = 202;
            $green2 = 244;
            $blue2 = 211;

            $red2 = $red2 + (int)(53 * $fresh_ratio2);
            $green2 = $green2 + (int)(11 * $fresh_ratio2);
            $blue2 = $blue2 + (int)(44 * $fresh_ratio2);

            //creates a row for every item with the background as a gradient of how long it's been in the fridge and a delete button 
            echo '<div class="fridgeitems"><div style="display:inline-block;background:linear-gradient(to right, rgb('.$red2.','.$green2.','.$blue2.') , rgb('.$red.','.$green.','.$blue.'));width:calc(100% - 60px);height:100%;"><a href="#" onclick="showItem('.$row2['item_id'].')" data-toggle="modal" data-target="#itemModal" class="itemname">'.$row2['item_name'].'</a></div>
                  <a href="#" onclick="deleteItem('.$row2['item_id'].')" class="pull-right"><button type="button" class="btn deleteUser"></button></a></div><hr><div style="clear:both;"></div>';
        }
        echo '</div>';

        //add item button
        echo '<button type="button" class="btn center-block" id="addItemButton" data-toggle="modal" data-target="#addItemModal" onclick="showAddItem()">Add Item</button>';

        echo '</div>';
        //the content of the manage tab
        echo '<div id="manage" class="tab-pane fade">';
        
        //queries for the last 5 items deleted and who deleted them sorted by descending order
        $query4 = "SELECT item_name, Users.name FROM Items JOIN Users ON Items.deleted_by = Users.user_id WHERE deleted = 'Yes' && fridge_id = ".$fridge_id." ORDER BY deleted_date DESC LIMIT 5";
        $response4 = @mysqli_query($dbc, $query4);

        echo '<div id="managetabhistory">History:</div>';
        echo '<div id="history">';
        while($row4 = mysqli_fetch_array($response4)) {
            //lists out the query on the html page
            echo '<div class="history"><span>'.$row4['item_name'].'</span><span class="pull-right">Deleted By:'." ".$row4['name'].'</span></div><hr>';
        }
        echo '</div>';

        //queries the users of the fridge
        $query3 = "SELECT name, creator, Users.user_id FROM Users JOIN Auth_Users ON Users.user_id = Auth_Users.user_id 
                   WHERE authorized = 'Yes' && fridge_id = ".$fridge_id;
        $response3 = @mysqli_query($dbc, $query3);

        echo '<div id="managetabuser">Users:</div>';
        echo '<div id="fridgeusers">';
        //lists out the users of the fridge and if he/she is the owner
        while($row3 = mysqli_fetch_array($response3)) {
            echo '<div class="fridgeusers"><span>'.$row3['name'];
            if($row3['creator'] == 'Yes') {
                echo ' (Owner)';
            }
            echo'</span>';

            //if the user is the creator of the fridge they are able to delete users and pass on their authority
            if($creator == 'Yes' && $row3['creator'] == 'No') {
                echo '<a href="#" onclick="deleteUser('.$row3['user_id'].')" class="pull-right"><button type="button" class="btn deleteUser"></button></a>';
                echo '<a href="#" onclick="passAuthority('.$row3['user_id'].')" class="pull-right"><button type="button" class="btn passAuthority"></button></a>';
                echo '<div style="clear:both;"></div>';
            }

            echo '</div><hr>';
        }
        echo '</div>';
        //add user button any current fridge user has access to
        echo '<button type="button" class="btn center-block" id="addUserButton" data-toggle="modal" data-target="#addUserModal" onclick="showAddUser()">Add User</button>';

        //delete fridge or leave fridge depending on if the user is the creator
        if($creator == 'Yes') {
            echo '<button type="button" class="btn center-block" id="deleteFridgeButton" data-toggle="modal" data-target="#deleteFridgeModal">Delete Fridge</button>';
        }
        else {
            echo '<button type="button" class="btn center-block" id="leaveFridgeButton" data-toggle="modal" data-target="#leaveFridgeModal">Leave Fridge</button>';
        }

        echo '</div>';
    echo '</div>';

?>



