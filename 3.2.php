<?php

$html = file_get_contents('3.2.html');
list( $top, $table, $bot)=explode('<!--==xxx==-->' , $html , 3);



echo $top . generateTable($table) . $bot ;


function generateTable($table){

    $tables = '';
    $replace = array('---name---' , '---value---');

    foreach (getenv() as $key => $value) {
        $replacement = array(htmlentities(rtrim($key,
            "\n\r")), htmlentities(rtrim($value, "\n\r")));

        $tables .= str_replace($replace , $replacement , $table );

    }
    foreach ($_SERVER as $key => $value) {
        $replacement = array(htmlentities(rtrim($key,
            "\n\r")), htmlentities(rtrim($value, "\n\r")));

        $tables .= str_replace($replace , $replacement , $table );

    }
return $tables;
}
?>