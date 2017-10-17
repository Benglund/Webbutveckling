<?php


$im = imagecreatetruecolor(rand(160,300), rand(160,300));
$background_color = imagecolorallocate($im, rand(40,200), rand(40,200), rand(40,200));

$text_color = imagecolorallocate($im,  rand(40,200),  rand(40,200),  rand(40,200));
imagestring($im, 30, 100, 100,  'Hello World', $text_color);

// Set the content type header - in this case image/jpeg
header('Content-Type: image/jpeg');

// Output the image
imagefill($im, 0,0, $background_color);

imagejpeg($im);

// Free up memory
imagedestroy($im);

?>