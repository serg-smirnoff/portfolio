<?php

// php curl get
function getResponse ($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_GET, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (!isset($response))
        return null;
    return $response;
}
echo getResponse ($url);

// php curl post
function postResponse ($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (!isset($response))
        return null;
    return $response;
}
echo postResponse ($url, $data);

// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

?>