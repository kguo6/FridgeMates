<?php

DEFINE('DB_USER', 'u619353059_2910');
DEFINE('DB_PASSWORD', '291030');
DEFINE('DB_HOST', 'mysql.hostinger.com');
DEFINE('DB_NAME', 'u619353059_2910');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to database' . mysqli_connect_error());

?>