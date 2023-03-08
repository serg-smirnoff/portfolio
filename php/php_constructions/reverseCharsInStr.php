<?php

/* ReverseCharsInStr
*/

$str = "Hello world!";

for ($i = strlen($str); $i >= 0; $i--){
    $return .= $str[$i];
}

echo $return;

?>