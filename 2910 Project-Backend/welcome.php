<?php
    session_start();
?>
<!doctype HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Food Note
    </title>
    <script>
        function $(id){
			var element = document.getElementById(id);
			if( element == null )
			alert( "Programmer error: " + id + " does not exist." );
			return element;
		}
    </script>
</head>
<body onload="content()">
    <?php
        echo "Welcome ".$_SESSION['USER_NAME'];
    ?>

    <br>

    <a href="fridge.php">My Fridges</a>

    <br>

    <a href="manage.php">Manage</a>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>