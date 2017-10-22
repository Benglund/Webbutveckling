<?php
header('Content-type: text/plain');

//print_r($_FILES);
if($_FILES['file']['size'] > 300000 or empty($_FILES)){
    die();
}
    $file = $_FILES['file']['tmp_name'];
   $type = $_FILES['file']['type'];

switch ($type) {

        case"image/jpeg":
            header('Content-Type: ' . $type );

            readfile($file);
            break;

        case"image/png":
            header('Content-Type: ' . $type);

            readfile($file);
            break;

    case"text/plain":
        readfile($file);
        break;

    default:
        echo $file['name']. ' ' . $type . ' ' . $file["size"];
        break;
}
    ?>