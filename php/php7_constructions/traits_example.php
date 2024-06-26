<?php

// определение типажа / trait
trait Pprint {
    public function whoAmI(){
        return get_class($this) . ': ' . (string) $this;
    }
    
}

class Human {

    use Pprint; //подключаем типаж, ключевое слово use

    protected $_name = 'unknown';
    
    public function __construct($name){
        $this->_name = $name;
    }

    public function __toString(){
        return (string) $this->_name;
    }
}


class Animal {

    use Pprint; //подключаем типаж, ключевое слово use

    protected $_name = 'unknown';
    
    public function __construct($name){
        $this->_name = $name;
    }

    public function __toString(){
        return (string) $this->_name;
    }
}

$a = new Human('Nikita');
echo $a->whoAmI(), PHP_EOL; //=> Human: Nikita

echo "<br>";

$b = new Animal('Cat');
echo $b->whoAmI(), PHP_EOL; //=> Human: Nikita

?>