<?php

//connecting to MySql

$conn = mysqli_connect ('localhost', 'root', '', 'message_app');

//testing connection 

if (mysqli_connect_errno()){
    echo 'DB connection Error: '.mysqli_connect_error();

}


?>
