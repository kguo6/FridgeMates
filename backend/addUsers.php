<?php

    session_start();

    require_once("config.php");

    $fridge_id = $_GET["fridge_id"];
    $email = $_POST["email"];

    $query1 = "SELECT user_id FROM Users WHERE email = '".$email."'";

    $response = @mysqli_query($dbc, $query1);

    $user = mysqli_fetch_assoc($response);

    $user_id = $user['user_id'];

    if(isset($user_id)) {
        $query2="INSERT INTO Auth_Users (user_id, fridge_id, authorized, creator)
                 VALUES (?,?,'Yes', 'No')
                 ON DUPLICATE KEY UPDATE authorized = 'Yes', creator = 'No'";
        
        $stmt = @mysqli_prepare($dbc, $query2);

        mysqli_stmt_bind_param($stmt, "ii", $user_id, $fridge_id);
        
        mysqli_stmt_execute($stmt);

        header("location: manage.php");
    }
    else {
        echo "User doesn't exist";
    }

    mysqli_close($dbc);

?>