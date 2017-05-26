<?php

    session_start();

    require_once("config.php");

    if($_POST) {
        $fridge_id = $_SESSION["FRIDGE_ID"];
        $email = htmlspecialchars($_POST["email"]);

        $query1 = "SELECT user_id FROM Users WHERE email = '".$email."'";

        $response = @mysqli_query($dbc, $query1);

        $user = mysqli_fetch_assoc($response);

        $user_id = $user['user_id'];

        if(isset($user_id)) {
            $query3 = "SELECT authorized FROM Auth_Users WHERE user_id =".$user_id." && fridge_id = ".$fridge_id;
            $response3 = @mysqli_query($dbc, $query3);
            $authorized = mysqli_fetch_assoc($response3);

            if($authorized['authorized'] == 'Yes') {
                echo 2;
            }
            else {
                $query2="INSERT INTO Auth_Users (user_id, fridge_id, authorized, creator)
                        VALUES (?,?,'Yes', 'No')
                        ON DUPLICATE KEY UPDATE authorized = 'Yes', creator = 'No'";
                
                $stmt = @mysqli_prepare($dbc, $query2);

                mysqli_stmt_bind_param($stmt, "ii", $user_id, $fridge_id);
                
                mysqli_stmt_execute($stmt);

                echo 1;
            }
        }
        else {
            echo 3;
        }

        mysqli_close($dbc);
    }

?>