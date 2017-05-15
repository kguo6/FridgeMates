<?php
    session_start();
    
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
        $_SESSION['ERROR'] = 2;
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $email, md5($password), $name);
	
    	mysqli_stmt_execute($stmt);
			
        $_SESSION['ERROR'] = 3;
    }

    mysqli_close($dbc);
    header("location: index.php");


?>