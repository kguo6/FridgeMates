<?php

    session_start();

    require_once("config.php");

    $item_id = $_GET['item_id'];
    $user_id = $_SESSION['USER_ID'];
 
    echo 0;

    $query2 = "SELECT deleted FROM Items WHERE item_id = ".$item_id;
    $response = @mysqli_query($dbc, $query2);
    $fridge = mysqli_fetch_assoc($response);

    echo 1;
    echo $fridge['deleted'];

    if($fridge['deleted'] == 'No') {

        echo 2;

        $query="INSERT INTO Items (item_id, deleted, deleted_by, deleted_date)
                VALUES (?,'Yes',?, NOW())
                ON DUPLICATE KEY UPDATE deleted = 'Yes', deleted_by = VALUES(deleted_by), deleted_date = NOW()";
                
        $stmt = @mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ii", $item_id, $user_id);
                
        mysqli_stmt_execute($stmt);
    }
    mysqli_close($dbc);


?>