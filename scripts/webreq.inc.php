<?php

$url = 'https://duketutor.screenconnect.com:8040/App_Extensions/ab282ca6-e265-408a-8de4-c449236df1b5/Service.ashx/FindorCreateSession/name/host';
$data = array('key1' => 'value1', 'key2' => 'value2');

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ echo("FAILURE");}

var_dump($result);