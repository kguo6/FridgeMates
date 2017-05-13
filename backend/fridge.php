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

        function fridges() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    $("fridgeBody").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "myFridges.php", true);
            xhttp.send();
        }
    </script>
</head>
<body onload="fridges()">
    <div id="fridgeBody">
    </div>
    <form action="createFridge.php" method="post">
        <label for="fridge_name">
            Fridge Name
            <input type="text" name="fridge_name" id="fridge_name">
            <input type="submit" value="create">
        </label>
    </form>
    <a href="index.php">Home</a><br><br><br><br>
</body>
</html>