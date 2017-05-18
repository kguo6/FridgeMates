<?php

    session_start();

    require_once("config.php");

    $item_id = $_GET['item_id'];

    $query="SELECT item_name, item_comment, item_date, name FROM Items JOIN Users ON Items.user_id = Users.user_id
            WHERE item_id =".$item_id;
        
    $response=@mysqli_query($dbc, $query);

    $row = mysqli_fetch_assoc($response);

        echo    '<div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" id="itemHeader">
                            <h4 class="modal-title">'.$row['item_name'].'</h4>
                        </div>
                        <div class="modal-body" id="itemBody">    
                            <table>
                                <tr>
                                    <th>Comments: </th>
                                    <td>'.$row['item_comment'].'</td>
                                </tr>
                                <tr>
                                    <th>Added By: </th>
                                    <td>'.$row['name'].'</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>'.$row['item_date'].'</td>
                                </tr>
                            </table>   
                        </div>
                        <div class="modal-footer" id="itemButtons">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>';

    mysqli_close($dbc);

?>