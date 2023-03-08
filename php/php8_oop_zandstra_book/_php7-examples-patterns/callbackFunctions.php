<?php
/*
	Callback Functions	
	http://php.net/manual/ru/language.types.callable.php
	*/

// Пример callback-функции
function my_callback_function() {
    echo 'Привет, мир!';
}

// Пример callback-метода
class MyClass {
    static function myCallbackMethod() {
        echo 'Привет, мир!';
    }
}

// Тип 1: Простой callback
call_user_func('my_callback_function');

// Тип 2: Вызов статического метода класса
call_user_func(array('MyClass', 'myCallbackMethod'));

// Тип 3: Вызов метода класса
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

// Тип 4: Вызов статического метода класса (С PHP 5.2.3)
call_user_func('MyClass::myCallbackMethod');

// Тип 5: Вызов относительного статического метода (С PHP 5.3.0)
class A {
    public static function who() {
        echo "A\n";
    }
}

class B extends A {
    public static function who() {
        echo "B\n";
    }
}

call_user_func(array('B', 'parent::who')); // A

// Тип 6: Объекты, реализующие __invoke могут быть использованы как callback (С PHP 5.3)
class C {
    public function __invoke($name) {
        echo 'Привет ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');

?>