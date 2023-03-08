<?php

// Извлекаем значение $_GET['user'], а если оно не задано,
// то возвращаем 'nobody'
$username = $_GET['user'] ?? 'nobody';
// Это идентично следующему коду:
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

// Данный оператор можно использовать в цепочке.
// В этом примере мы сперва проверяем, задан ли $_GET['user'], если нет,
// то проверяем $_POST['user'], и если он тоже не задан, то присваеваем 'nobody'.
$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';

?>