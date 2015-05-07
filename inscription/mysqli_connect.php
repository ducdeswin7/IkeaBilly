<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'inscription');

$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$db){
    trigger_error('Could not connect to mysql:' . mysqli_connect_error());
    }
?>