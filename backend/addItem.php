<?php

    session_start();

    require_once("config.php");

    $item_name = $_POST["item_name"];
    $fridge_id = $_GET["fridge_id"];
    $user_id = $_SESSION["USER_ID"];
    $item_comment = $_POST["item_comment"];

    $query="INSERT INTO Items (item_id, user_id, fridge_id, item_name, item_comment, item_date, deleted)
            VALUES (NULL,?,?,?,?,NOW(),'No')";
    
    $stmt = @mysqli_prepare($dbc, $query);

    mysqli_stmt_bind_param($stmt, "iiss", $user_id, $fridge_id, $item_name, $item_comment);
	
    mysqli_stmt_execute($stmt);

    mysqli_close($dbc);

    header("location: fridge.php");

?>