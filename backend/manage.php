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

        function manage() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    $("manageBody").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "manageFridges.php", true);
            xhttp.send();
        }
    </script>
</head>
<body onload="manage()">
    <div id="manageBody">
    </div>
    <a href="index.php">Home</a><br><br><br><br>
</body>
</html>