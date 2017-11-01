<?php
if(strlen($_POST['name']) != 0 and empty($_POST['email'])){
    $name = htmlspecialchars($_POST['name']);
    $html = file_get_contents('4.1.2.1.html');
    $html = str_replace('$name' , $name , $html );
    echo $html;

}elseif(strlen($_POST['name']) and !empty($_POST['email'])){
    header("content-type: text/plain");
    $name = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars($_POST['email']);
    echo 'Namn: ' . $name . '  Email: ' . $mail;
}else echo 'No data or wrong data was submitted';
?>