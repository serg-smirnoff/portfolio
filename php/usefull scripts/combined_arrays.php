<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function combined($a, $b){

    foreach ($a as $k => $v){
        $c[] = $a[$k];
        $c[] = $b[$k];
    }
    print_r($c);
}

$a = array(
    "a",
    "b",
    "c"
);

$b = array(
    "1",
    "2",
    "3"
);

combined($a,$b);

?>