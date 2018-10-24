<?php

$servername = "localhost";
$dbUsername = "pmauser";
$dbPassword = "Achintya2";
$dbName = "ta_info";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed! ".mysqli_connect_error());
    
}