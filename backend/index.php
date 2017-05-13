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

        function content() {
            <?php
            if(isset($_SESSION['USER_ID']) &&
	           (trim($_SESSION['USER_ID']) != '')) {
                   echo 'var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if(this.readyState == 4 && this.status == 200) {
                                $("content").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "welcome.php", true);
                        xhttp.send();';
               }
               else {
                    echo 'var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if(this.readyState == 4 && this.status == 200) {
                                $("content").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "loginform.php", true);
                        xhttp.send();';
               }
               ?>
        }
    </script>
</head>
<body onload="content()">
    <div id="content">
    </div>
</body>
</html>