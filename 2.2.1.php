<?php

//var_dump($_POST);
//print_r($_POST);

foreach ($_POST as $_KEY => $value){
    echo "$_KEY: $value \n", "<br> hi";
}
foreach ($_GET as $_KEY => $value){
    echo "$_KEY: $value \n", "<br> ";
}
?>
