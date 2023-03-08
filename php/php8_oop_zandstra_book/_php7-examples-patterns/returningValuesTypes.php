<?php
/*
	В PHP 7 можно указать, значение какого типа должна вернуть функция
	function arraysSum(array ...$arrays): array
*/

function arraysSum(array ...$arrays): array
{
    return array_map(function(array $array): int {
        return array_sum($array);
    }, $arrays);
}

print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));

?>