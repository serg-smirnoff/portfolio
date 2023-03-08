<?php
/*
    Anoinmous functions
    Closure
    */

//Помещаем анонимную функцию внутрь обычной переменной
$showName = function($name) {
    echo 'Мое имя: '. $name .'<br>';
};

//Осуществляем несколько вызовов через переменную
$showName('Олег'); //Результат: Мое имя: Олег
$showName('Андрей'); //Результат: Мое имя: Андрей


//Создаем массив для перебора через array_walk
$colorsToFlower = [
    'Красный' => 'Роза',
    'Желтый' => 'Тюльпан',
    'Синий' => 'Василек'
];

//Перебираем массив с помощью функции array_walk
//и выводим специально сформированную строку
array_walk($colorsToFlower, function($color, $flower){
    echo "Цвет - $color : Растение - $flower<br>";
});

//То же самое, но только с использованием цикла
foreach($colorsToFlower as $color => $flower) {
    echo "Цвет - $color : Растение - $flower<br>";
}

/*
* В обоих случаях, результат:
* Цвет - Красный : Растение - Роза
* Цвет - Желтый : Растение - Тюльпан
* Цвет - Синий : Растение - Василек
*/

//Переменные из родительского окружения
$operationSystem = 'Windows';
$timeToShutdown = 1000;

//Определяем анонимную функцию, наследующую значения
//переменных из родительской области видимости
$systemInfo = function() use ($operationSystem, $timeToShutdown){
    echo "Вы работаете на ОС: $operationSystem<br>";
    echo "Время до выключения системы: $timeToShutdown минут";
};

//Вызываем анонимную функцию, хранящуюся в переменной
$systemInfo();
/*
* Результат:
* Вы работаете на ОС: Windows
* Время до выключения системы: 1000 минут
*/

//Переменные из родительского окружения
$color = 'Желтый';
$car = 'Пежо';

//Определяем анонимную функцию обычным
// наследованием и использованием ссылки
$carInfo = function() use ($color, &$car){
    echo "Цвет автомобиля: $color<br>";
    echo "Марка автомобиля: $car";
};

//Изменяем данные унаследованных переменных
$color = 'Красный';
$car = 'Мустанг';

//Видим, что цвет автомобиля остался прежний,
//а марка изменилась, так как передана по ссылке
$carInfo();
/*
* Результат:
* Цвет автомобиля: Желтый
* Марка автомобиля: Мустанг
*/

?>