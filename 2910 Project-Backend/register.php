<?php

    require_once("config.php");

    $email = $_POST["register_username"];
    $password = $_POST["register_password"];
    $name = $_POST["register_name"];

    $query1="SELECT user_id FROM Users
             WHERE email = \"".$email."\"";
    $query2="INSERT INTO Users (user_id, email, password, name)
            VALUES (NULL,?,?,?)";
    
    $response = @mysqli_query($dbc, $query1);
    $row = mysqli_fetch_array($response);
    $stmt = @mysqli_prepare($dbc, $query2);

    if(isset($row)) {
        echo "User already exists";
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $email, md5($password), $name);
	
    	mysqli_stmt_execute($stmt);
			
        echo "Registration Successful";

        echo '<a href="index.php">Home</a>';
    }

    mysqli_close($dbc);


?>