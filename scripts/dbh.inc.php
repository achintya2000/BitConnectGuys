<?php
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$servername = $dbparts['host'];
$dbUsername = $dbparts['user'];
$dbPassword = $password = $dbparts['pass'];
$dbName = $database = ltrim($dbparts['path'],'/');

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed! ".mysqli_connect_error());  
}
