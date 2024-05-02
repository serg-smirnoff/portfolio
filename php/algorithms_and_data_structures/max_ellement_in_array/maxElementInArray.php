<?
function maximum(array $arr): int {
    $max = $arr[0];
    for ($i = 1; $i <= sizeOf($arr); $i++){
        if ($arr[$i] > $max){ 
            $max = $arr[$i];
        }
    }
    return $max;
}
// var_dump(maximum());
echo maximum($arr = [1,2,3,4,10,100,3,4987,6,7,8,9]);    
?>