<?php

    session_start();

    require_once("config.php");

    $user_id = $_GET['user_id'];
    $fridge_id = $_GET['fridge_id'];
    $user_id2 = $_SESSION['USER_ID'];

    $query="INSERT INTO Auth_Users (user_id, fridge_id, creator)
            VALUES (?,?,'Yes')
            ON DUPLICATE KEY UPDATE creator = 'Yes'";
        
    $stmt = @mysqli_prepare($dbc, $query);

    mysqli_stmt_bind_param($stmt, "ii", $user_id, $fridge_id);
        
    mysqli_stmt_execute($stmt);

    $query2="INSERT INTO Auth_Users (user_id, fridge_id, creator)
             VALUES (?,?,'No')
             ON DUPLICATE KEY UPDATE creator = 'No'";

    $stmt2 = @mysqli_prepare($dbc, $query2);

    mysqli_stmt_bind_param($stmt2, "ii", $user_id2, $fridge_id);

    @mysqli_stmt_execute($stmt2);

    mysqli_close($dbc);

    header("location: manage.php");

?>