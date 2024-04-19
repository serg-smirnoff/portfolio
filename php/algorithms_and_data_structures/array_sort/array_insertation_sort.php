<?php

function insertationSort($a){
    $n = count($a);
    for ($i=1;$i<$n;$i++){
        $j = $i-1;
        while ($j >= 0 and $a[$j] > $a[$j+1]){
            // swap array elements
            $temp = $a[$j];
            $a[$j] = $a[$j+1];
            $a[$j+1] = $temp;
            $j--;
        }
    }
    return $a;
}

$a = [1,3,2,1,3,4,1,2,3,5,6,7,2,3,9];

echo "Original array:  " . implode(", ", $a) . "\n";
echo "<br>";
echo "Sorted array: " . implode(", ", insertationSort($a)) . "\n";
