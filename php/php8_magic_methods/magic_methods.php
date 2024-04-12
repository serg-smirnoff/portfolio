<?php

class MagicMethods {
    
    private $data = [];

    public function __construct() {
        echo "Constructor called!";
    }
    
    public function __get($key) {
        return $this->data[$key];
    }

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }
    
    public function __isset($name){
        echo "Isset '$name'?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        echo "Unset '$name'\n";
        unset($this->data[$name]);
    }

    public function __call($method, $arguments) {
        echo "Calling method: $method ";
        echo "Arguments: ". implode(', ', $arguments);
    }
    
    public static function __callStatic($method, $arguments) {
        echo "Calling method: $method ";
        echo "Arguments: ". implode(', ', $arguments);
    }

    public function __toString() {
        return "This is an instance of MyClass";
    }
    
    public function __sleep(){}

    public function __wakeup(){}

    public function __serialize(){}

    public function __unserialize($arg){}

    public function __invoke(){}

    public static function __set_state($arg){}

    public function __clone(){}

    public function __debugInfo(){}

    public function __destruct() {
        echo "Destructor called!";
    }

}

// __construct()
$obj = new MagicMethods();              // Output: Constructor called!

// __set()
$obj->name = "John";                    // Sets the 'name' property

echo "<br><br>";

// __get()
echo $obj->name;                        // Output: John    

echo "<br><br>";

// __isset()

echo isset($obj->tratata);
echo "<br><br>";

// __unset()
unset($obj->tratata);
echo "<br><br>";

// __call()
$obj->myMethod("arg1", "arg2");         // Output: Calling method: myMethod Arguments: arg1, arg2

echo "<br><br>";

// __callStatic()
MagicMethods::myMethod("arg1", "arg2");// Output: Calling method: myMethod Arguments: arg1, arg2

echo "<br><br>";

// __toString()
echo $obj;                              // Output: This is an instance of MyClass

echo "<br><br>";

unset($obj);
