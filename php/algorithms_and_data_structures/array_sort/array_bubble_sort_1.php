<?php 

function bubbleSort(array $a){
  $count = count($a);
  for ($i = 0; $i < $count; $i++){
    for ($j = $count - 1; $j > $i; $j--){
      if ($a[$j] < $a[$j - 1]) {
        $tmp = $a[$j];
        $a[$j] = $a[$j - 1];
        $a[$j - 1] = $tmp;
      }
    }
  }
  return $a;
}


$a = [1,3,2,1,3,4,1,2,3,5,6,7,2,3,9];
echo "Original array:  " . implode(", ", $a) . "\n";
echo "<br>";
echo "Sorted array: " . implode(", ", bubbleSort($a)) . "\n";
