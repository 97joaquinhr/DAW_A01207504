<?php
    $name = "lalo";
    $url = "http://localhost:8080/DAW_A01207504/Lab24_servicio/public/$name"; //Route to the REST web service
    $c = curl_init($url);
    $response = curl_exec($c);
    curl_close($c);
    //var_dump($response); 
?>