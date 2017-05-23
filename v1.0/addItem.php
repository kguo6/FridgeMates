<?php

    session_start();

    date_default_timezone_set("America/Vancouver");

    require_once("config.php");

    if($_POST) {
        $item_name = htmlspecialchars($_POST["item_name"]);
        $fridge_id = htmlspecialchars($_SESSION["FRIDGE_ID"]);
        $user_id = $_SESSION["USER_ID"];
        $item_comment = htmlspecialchars($_POST["item_comment"]);
        $timestamp  = date('Y-m-d G:i:s');

        $query="INSERT INTO Items (item_id, user_id, fridge_id, item_name, item_comment, item_date, deleted)
                VALUES (NULL,?,?,?,?,?,'No')";
        
        $stmt = @mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "iisss", $user_id, $fridge_id, $item_name, $item_comment, $timestamp);
        
        mysqli_stmt_execute($stmt);

        mysqli_close($dbc);

        echo 1;
    }

?>