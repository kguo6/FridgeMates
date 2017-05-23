<?php

    session_start();

    require_once("config.php");

    $fridge_id = $_SESSION['FRIDGE_ID'];

    $query="DELETE FROM Fridges WHERE fridge_id =".$fridge_id;
    $query2="DELETE FROM Auth_Users WHERE fridge_id =".$fridge_id;
        
    $response=@mysqli_query($dbc, $query);
    $response2=@mysqli_query($dbc, $query2);
    mysqli_close($dbc);

?>