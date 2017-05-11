<?php

    session_start();

    require_once("config.php");

    $user_id = $_GET['user_id'];
    $fridge_id = $_GET['fridge_id'];

    $query="INSERT INTO Auth_Users (user_id, fridge_id, authorized)
             VALUES (?,?,'No')
             ON DUPLICATE KEY UPDATE authorized = 'No'";
        
    $stmt = @mysqli_prepare($dbc, $query);

    mysqli_stmt_bind_param($stmt, "ii", $user_id, $fridge_id);
        
    mysqli_stmt_execute($stmt);

    mysqli_close($dbc);

    header("location: manage.php");

?>