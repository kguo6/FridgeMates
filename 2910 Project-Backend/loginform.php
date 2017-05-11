<!doctype HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Food Note
    </title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="login_username">
            Email
            <input type="text" name="login_username" id="login_username">
        </label>
        <label>
            Password
            <input type="password" name="login_password" id="login_password">
        </label>
        <input type="submit" value="Log In">
    </form>
    <form action="register.php" method="POST">
        <label for="register_username">
            Email
            <input type="text" name="register_username" id="register_username">
        </label>
        <label for="register_password">
            Password
            <input type="password" name="register_password" id="register_password">
        </label>
        <label for="register_name">
            Name
            <input type="text" name="register_name" id="register_name">
        </label>
        <input type="submit" value="Register">
    </form>
</body>
</html>