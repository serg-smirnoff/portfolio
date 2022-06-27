<?php

function getContent($url, $referer){

$cookie='';

$ch = curl_init();

curl_setopt($ch, CURLOPT_REFERER, $referer);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE,$cookie);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; uk; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 Some plugins');

$data = curl_exec($ch);

$header = substr($data,0, curl_getinfo($ch,CURLINFO_HEADER_SIZE));
$body = substr($data, curl_getinfo($ch,CURLINFO_HEADER_SIZE));
preg_match_all("/Set-Cookie: (.*?)=(.*?);/i", $header, $res);

$cookie = '';
foreach ($res[1] as $key => $value) {
    $cookie = $value.'='.$res[2][$key].'; ';
};

curl_close($ch);

$curl = curl_init();
curl_setopt($curl, CURLOPT_REFERER, $referer);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_COOKIE, $cookie);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; uk; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 Some plugins');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

$data2 = curl_exec($curl);

curl_close($curl);
return $data2;

}

$html = getContent('https://www.avito.ru/kaliningrad/avtomobili/skoda_octavia_2014_1400675007', 'https://www.google.com/?param=test');
echo $html;?>