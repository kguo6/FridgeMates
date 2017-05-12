<?php

$f = fopen('books.txt', 'w') or die('error');

fwrite($f, "getting to yes\n". PHP_EOL);
fwrite($f, 'four hour workweek\n' . PHP_EOL);
fwrite($f, "getting real".PHP_EOL);

fclose($f);