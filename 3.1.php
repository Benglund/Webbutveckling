<?php
//header('Content-type: text/plain');

ob_start();

include_once('1.1.php');

$counts = ob_get_contents();
ob_end_clean();


$html = file_get_contents('3.1.html');
$html = str_replace('$count' , $counts , $html );
header_remove();
echo $html;

?>