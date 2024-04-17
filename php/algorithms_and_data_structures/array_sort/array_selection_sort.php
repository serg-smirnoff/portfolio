<?php

function selectionSort($a){
    $n = count($a);
    for ($i=0;$i<$n;$i++){
        $min = $i;
        for ($j=$i+1; $j<$n;$j++){
            if ($a[$j] < $a[$min]){
                $min = $j;
                // swap array elements
                $temp = $a[$i];
                $a[$i] = $a[$min];
                $a[$min] = $temp;
            }
        }
    }
    return $a;
}

$a = [1,3,2,1,3,4,1,2,3,5,6,7,2,3,9];

echo "Original array:  " . implode(", ", $a) . "\n";
echo "<br>";
echo "Sorted array: " . implode(", ", selectionSort($a)) . "\n";