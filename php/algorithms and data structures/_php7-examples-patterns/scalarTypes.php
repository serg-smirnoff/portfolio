<?php
/*
	Скалярные типы
	http://php.net/manual/ru/functions.arguments.php#functions.arguments.type-declaration
	*/

function sumOfInts(int ...$ints){
    return array_sum($ints);
}

var_dump(sumOfInts(2, '3', 4.1));

?>