
<?php
//var_dump($_POST);
//echo $file = $_POST["push_button"];

//print_r($_FILES);
header('Content-type: text/plain');
$file = $_FILES["file"];
echo $file["size"];
echo $file['type'], "\n";
$size = $file["size"];
if($size > 35000){
    die("Fil för stor");
}

$type =$file["type"];

switch ($type){

    case"text/plain":
echo readfile($file["name"]);
break;
    case"image/jpeg":
        header('Content-Type:'.$type, true);
       // header('Content-Length: ' . filesize($file));
        readfile($file);
        break;
    case"image/png":
        header('Content-Type:'.$type, true);
        // header('Content-Length: ' . filesize($file));
        readfile($file);
        break;
    default:
        echo $file["name"], $type, $size;
        break;
}

    ?>