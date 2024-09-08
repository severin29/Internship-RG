<?php

$hostName = 'localhost';
$dbUser = 'root';
$dbPass = '11111111';
$dbName = 'sports';

$conn = mysqli_connect($hostName, $dbUser, $dbPass, $dbName);

if (!$conn) {
    echo "connection failed";
}else{
    echo "connected successfully";
}

