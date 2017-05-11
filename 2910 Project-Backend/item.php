<?php

    session_start();

    require_once("config.php");

    $item_id = $_GET['item_id'];

    $query="SELECT item_name, item_comment, item_date, name FROM Items JOIN Users ON Items.user_id = Users.user_id
            WHERE item_id =".$item_id;
        
    $response=@mysqli_query($dbc, $query);

    while($row = mysqli_fetch_array($response)) {
        echo $row['item_name'].'<br>';
        echo $row['item_comment'].'<br>';
        echo $row['item_date'].'<br>';  
        echo $row['name'].'<br>';
    }

        mysqli_close($dbc);

?>