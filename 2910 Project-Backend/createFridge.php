<?php

    session_start();

    require_once("config.php");

    $fridge_name = $_POST["fridge_name"];
    $user_id = $_SESSION["USER_ID"];

    $query1="INSERT INTO Fridges (fridge_id, fridge_name)
            VALUES (NULL,?)";
    
    $stmt1 = @mysqli_prepare($dbc, $query1);

    mysqli_stmt_bind_param($stmt1, "s", $fridge_name);
	
    mysqli_stmt_execute($stmt1);

    $query2 = "SELECT LAST_INSERT_ID()";

    $response = @mysqli_query($dbc, $query2);

    $fridge = mysqli_fetch_assoc($response);

    $fridge_id = $fridge['LAST_INSERT_ID()'];

    $query3="INSERT INTO Auth_Users (fridge_id, user_id, authorized, creator)
             VALUES (?, ?, 'Yes', 'Yes')";

    $stmt2 = @mysqli_prepare($dbc, $query3);

    mysqli_stmt_bind_param($stmt2, "ii", $fridge_id, $user_id);

    mysqli_stmt_execute($stmt2);

    mysqli_close($dbc);

    header("location: fridge.php");

?>