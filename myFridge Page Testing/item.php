<?php

    session_start();

    require_once("config.php");

    date_default_timezone_set("America/Vancouver");

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
                            <table id="itemTable">
                                <tr>
                                    <th>Comments: </th>
                                    <td>'.$row['item_comment'].'</td>
                                </tr>
                                <tr>
                                    <th>Added By: </th>
                                    <td>'.$row['name'].'</td>
                                </tr>
                                <tr>
                                    <th>Added: </th>
                                    <td>';
                                    
        $delta_seconds = time() - strtotime($row['item_date']);
            if($delta_seconds < 60) {
                echo $delta_seconds.' Seconds Ago';
            }  
            else if ($delta_seconds < 3600) {
                $delta_minutes = floor($delta_seconds / 60);
                echo $delta_minutes.' Minutes Ago';
            } 
            else if ($delta_seconds < 86400) {
                $delta_hours = floor($delta_seconds / 3600);
                echo $delta_hours.' Hours Ago';
            }          
            else {
                $delta_days = floor($delta_seconds / 86400);
                echo $delta_days.' Days Ago';
            }               

        echo                            '</td>
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