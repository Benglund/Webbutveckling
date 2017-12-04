<?php
    $mysql_host='atlas.dsv.su.se';
    $mysql_user='usr_17383323';
    $mysql_password='383323';
    $mysql_db='db_17383323';
    $mysql_port = 3306;

if (!$link = @mysqli_connect($mysql_host, $mysql_user,$mysql_password, $mysql_db, $mysql_port)){
die(mysqli_error($link)); //printar ut error
}


