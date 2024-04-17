<?php 

function quickSort($array) { 
	
    $length = count($array); 

	if ($length <= 1) { 
		return $array; 
	} else { 
		$pivot = $array[0]; 
		$left = $right = array(); 

		for ($i = 1; $i < $length; $i++) { 
			if ($array[$i] < $pivot) { 
				$left[] = $array[$i]; 
			} else { 
				$right[] = $array[$i]; 
			} 
		} 

		return array_merge( 
			quickSort($left), 
			array($pivot), 
			quickSort($right) 
		); 
	}

} 

// Driver code 
$array = array(3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5);
$sortedArray = quickSort($array);

echo "Original Array: " . implode(", ", $array) . "\n";
echo "<br>";
echo "Sorted Array: " . implode(", ", $sortedArray);
