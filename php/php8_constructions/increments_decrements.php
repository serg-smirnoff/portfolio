<?php

/*
    Постфиксный инкремент:
    $a = 5;
    var_dump($a++) = int(5)
    var_dump($a) = int(6)

    Префиксный инкремент:
    $a = 5;
    var_dump(++$a) = int(6)
    var_dump($a) = int(6)

    Постфиксный декремент:
    $a = 5;
    var_dump($a--) = int(5)
    var_dump($a) = int(4)

    Префиксный декремент:
    $a = 5;
    var_dump(--$a) = int(4)
    var_dump($a) = int(4)
    

    $a=5;
    echo $a++;
    echo $a++;

    5
    6

    $a=5;
    echo ++$a;
    echo ++$a;

    6
    7

    */

echo 'Постфиксный инкремент:', PHP_EOL;
echo "<br/>";
$a = 5;
echo '$a = 5;';
echo "<br/>";
echo 'var_dump($a++) = '; var_dump($a++);
echo "<br/>";
echo 'var_dump($a) = ';   var_dump($a);

echo "<br/>";echo "<br/>";

echo 'Префиксный инкремент:', PHP_EOL;
echo "<br/>";
$a = 5;
echo '$a = 5;';
echo "<br/>";
echo 'var_dump(++$a) = '; var_dump(++$a);
echo "<br/>";
echo 'var_dump($a) = ';   var_dump($a);

echo "<br/>";echo "<br/>";

echo 'Постфиксный декремент:', PHP_EOL;
echo "<br/>";
$a = 5;
echo '$a = 5;';
echo "<br/>";
echo 'var_dump($a--) = '; var_dump($a--);
echo "<br/>";
echo 'var_dump($a) = ';   var_dump($a);

echo "<br/>";echo "<br/>";

echo 'Префиксный декремент:', PHP_EOL;
echo "<br/>";
$a = 5;
echo '$a = 5;';
echo "<br/>";
echo 'var_dump(--$a) = '; var_dump(--$a);
echo "<br/>";
echo 'var_dump($a) = ';   var_dump($a);

