<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $hashMap = [];
        $count = count($nums);
        for($i=0;$i<$count;$i++){
                $secondIndex = $target-$nums[$i];
                if(isset($hashMap[$secondIndex])){
                    return array($i,$hashMap[$secondIndex]);
                }else{
                    $hashMap[$nums[$i]]=$i;
                }
        }
        return [];
    }
}

$solution = new Solution;
print_r($solution->twoSum([1,4,5,16,7],9));
