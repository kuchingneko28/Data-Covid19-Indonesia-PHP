<?php

function getApi($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

    $result = curl_exec($ch);
    if(!$result){
        echo "something is not right !";
    }
    else{
        return $result;
    }
    curl_close($ch);
}