<?php

    session_start();

    require_once("config.php");

    $user_id = $_SESSION['USER_ID'];
    $fridge_id = $_GET['fridge_id'];

    $query="SELECT * FROM Auth_Users WHERE user_id=".$user_id." && fridge_id=".$fridge_id;

    $response=@mysqli_query($dbc, $query);

    $row = mysqli_fetch_assoc($response);

    if($row['creator'] == 'No') {
        $query2="INSERT INTO Auth_Users (user_id, fridge_id, authorized)
                VALUES (?,?,'No')
                ON DUPLICATE KEY UPDATE authorized = 'No'";
            
        $stmt = @mysqli_prepare($dbc, $query2);

        mysqli_stmt_bind_param($stmt, "ii", $user_id, $fridge_id);
            
        mysqli_stmt_execute($stmt);

        mysqli_close($dbc);

        header("location: manage.php");
    }
    else {
        echo 'You are the owner of this fridge.';
    }

?>