<?php
    session_start();
    
    require_once("config.php");

    if($_POST) {
        $email = trim(htmlspecialchars($_POST["register_username"]));
        $password = trim(htmlspecialchars($_POST["register_password"]));
        $name = trim(htmlspecialchars($_POST["register_name"]));

        $query1="SELECT user_id FROM Users
                WHERE email = \"".$email."\"";
        $query2="INSERT INTO Users (user_id, email, password, name)
                VALUES (NULL,?,?,?)";
        
        $response = @mysqli_query($dbc, $query1);
        $row = mysqli_fetch_array($response);
        $stmt = @mysqli_prepare($dbc, $query2);

        if(isset($row)) {
            echo 1;
        }
        else {
            mysqli_stmt_bind_param($stmt, "sss", $email, md5($password), $name);
        
            mysqli_stmt_execute($stmt);
                
            echo 2;
        }

        mysqli_close($dbc);
    }

?>