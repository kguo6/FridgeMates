<?php

    session_start();

    require_once("config.php");

    $fridge_id = $_GET['fridge_id'];

    $query="DELETE FROM Fridges WHERE fridge_id =".$fridge_id;
    $query2="DELETE FROM Auth_Users WHERE fridge_id =".$fridge_id;
        
    $response=@mysqli_query($dbc, $query);
    $response2=@mysqli_query($dbc, $query2);

    if($response && $response2 && $response3) {
        header("location: manage.php");
        mysqli_close($dbc);
    }
    else{
        mysqli_close($dbc);
        echo 'Delete Error';
    }

?>