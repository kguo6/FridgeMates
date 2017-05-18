<?php

    session_start();

    require_once("config.php");

    if($_POST) {
        $email = trim($_POST["login_username"]);
        $password = trim($_POST["login_password"]);

        $query = "SELECT * FROM Users
                WHERE email = '$email' AND password = '".md5($password)."'";
        
        $response = @mysqli_query($dbc, $query);

        $user = mysqli_fetch_assoc($response);

        if(isset($user)) {
            session_regenerate_id();
            $_SESSION['USER_ID'] = $user['user_id'];
            $_SESSION['USER_NAME'] = $user['name'];
            session_write_close();
        }
        else {
            echo 1;
        }
        
        mysqli_close($dbc);
    }
?>