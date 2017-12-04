<?php

require 'connectDB.php';
require 'core.php';

if(loggedIn()){
    echo 'You\'re logged in.' . '<a href="logOut.php">Log out</a>';
}else {

    include 'loginForm.php';
}


?>