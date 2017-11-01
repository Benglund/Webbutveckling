<?php

if(isset($_GET['name']) and empty($_GET['mail'])){
    $name = htmlspecialchars($_GET['name']);
    $html = file_get_contents('4.1.1.1.html');
    $html = str_replace('$name' , $name , $html );
    echo $html;

}elseif(isset($_GET['name']) and !empty($_GET['mail'])){
    header("content-type: text/plain");
    $name = htmlspecialchars($_GET['name']);
    $mail = htmlspecialchars($_GET['mail']);
    echo $name . $mail;
}else echo 'No data or wrong data was submitted';

?>