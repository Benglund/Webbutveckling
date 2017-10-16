<?php

//echo "hello world";
header('Content-type: text/plain');

if(!$counterfile = @fopen("counter1.txt", "r+"))
$counterfile = @fopen("counter1.txt", "w+");

flock($counterfile, LOCK_EX);

$count = (int)fgets($counterfile);

++$count;

ftruncate($counterfile, 0);
rewind($counterfile);

fputs($counterfile, $count);

fclose($counterfile);

echo $count;


?>
