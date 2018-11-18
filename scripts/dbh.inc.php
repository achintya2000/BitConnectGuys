<?php

$servername = "us-cdbr-iron-east-01.cleardb.net";
$dbUsername = "b9b0bab205ee44";
$dbPassword = "4268dd78";
$dbName = "heroku_0671d1b843b6769";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed! ".mysqli_connect_error());

}