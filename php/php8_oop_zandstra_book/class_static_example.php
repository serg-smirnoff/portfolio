<?php 

// static
 
// Статические методы это функции , применяемые в контексте класса .
// Они не могут сами получать доступ к обычным свойствам класса, пото -
// му что такие свойства относятся к объектам . Но из статических методов
// можно обращаться к статическим свойствам . Если изменить статическое
// свойство, то все экземпляры данного класса смогут получить доступ к но -
// вому значению этого свойства .
// Доступ к статическому элементу осуществляется через класс, а не через
// экземпляр объекта , и поэтому переменная для ссылки на объект не требу -
// ется . Вместо этого используются имя класса и два знака двоеточия " : : " ,
// как в следующем примере кода

class StaticExample{
    
    public static int $aNum = 0;
    
    public static function sayHello() : void {
        // обращение к статическому свойству в классе (в методе класса)
        self::$aNum = 4;
        var_dump(self::$aNum);
    }

}

// обращение к статическому свойству вне класса
var_dump(StaticExample::$aNum);
var_dump(StaticExample::sayHello());

?>