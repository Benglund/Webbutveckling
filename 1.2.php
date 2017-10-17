<?php
header('Content-type: text/plain');

foreach ($_ENV as $key => $value) {
    echo "$key: $value\n";
}

?>