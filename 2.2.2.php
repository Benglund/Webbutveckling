
<?php
//var_dump($_POST);
//echo $file = $_POST["push_button"];
$file = $_POST["push_button"];

header("Content-Type: ", image_type_to_mime_type(IMAGETYPE_WBMP));

$image = imagecreatefrompng($file);

//header('Content-Type: ' . image_type_to_mime_type(IMAGETYPE_WBMP));
image2wbmp($image); // output the stream directly
imagedestroy($image);

    ?>