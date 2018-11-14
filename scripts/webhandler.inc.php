<?php

function send_emails($studentEmail, $taEmail) {
    $curl = curl_init();
    $url = "https://duketutor.screenconnect.com:443/App_Extensions/080d198d-8ab9-4440-bc52-9183a8df4452/Service.ashx/CreateSession/$studentEmail/$taEmail";
    
    curl_setopt($curl, CURLOPT_URL,$url);
    
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
    $result = curl_exec($curl);
    curl_close($curl);
}
?>