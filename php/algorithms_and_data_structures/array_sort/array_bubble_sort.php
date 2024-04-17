<?php 

function bubbleSort($a){
    
    $i = 0;
    $t = true;
    
    while ($t){
      $t = false;
      for ($j = 0; $j < count($a) - $i - 2; $j++){
        if ($a[$j] > $a[$j+1]){
            // swap array elements
            $temp    = $a[$j+1];
            $a[$j+1] = $a[$j];
            $a[$j]   = $temp;
            $t = true;
        }
      }
      $i = $i + 1;
    }
    
    return $a;

}

$a = [1,3,2,1,3,4,1,2,3,5,6,7,2,3,9];
echo "Original array:  " . implode(", ", $a) . "\n";
echo "<br>";
echo "Sorted array: " . implode(", ", bubbleSort($a)) . "\n";
