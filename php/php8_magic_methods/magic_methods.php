<?php

class MagicMethods {

    private $data = [];
    
    public function class_name(): string{
        return __CLASS__;
    }

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

    public function __toString(){
        return "This is an instance of " . $this->class_name();
    }
    
    public function __sleep(){
    }

    public function __wakeup(){
    }

    public function __serialize() : array{
        return ['name' => $this->class_name()];
    }

    public function __unserialize($arg): void{
        echo "Calling __unserialize() magic method";
    }

    public function __invoke($x){
        echo $this->class_name() . " class object is called as a function!";
        // echo "<br>";
        // var_dump($x);
    }

    public static function __set_state($arg){

    }

    public function __clone(){
        echo "Something was cloned";
    }

    public function __debugInfo(){}

    public function __destruct(){
        echo "Destructor called!";
    }

}

// __construct()
echo "<strong>__construct()</strong><br>";
$obj = new MagicMethods();              // Output: Constructor called!

echo "<br><br>";

// __set()
echo "<strong>__set()</strong><br>";
$obj->name = "John";                    // Sets the 'name' property

echo "<br>";

// __get()
echo "<strong>__get()</strong><br>";
echo $obj->name;                        // Output: John    
echo "<br><br>";

// __isset()
echo "<strong>__isset()</strong><br>";
echo isset($obj->tratata);
echo "<br><br>";

// __unset()
echo "<strong>__unset()</strong><br>";
unset($obj->tratata);
echo "<br><br>";

// __call()
echo "<strong>__call()</strong><br>";
$obj->myMethod("arg1", "arg2");         // Output: Calling method: myMethod Arguments: arg1, arg2

echo "<br><br>";

// __callStatic()
echo "<strong>__callStatic()</strong><br>";
MagicMethods::myMethod("arg1", "arg2"); // Output: Calling method: myMethod Arguments: arg1, arg2

echo "<br><br>";

// __toString()
echo "<strong>__toString()</strong><br>";
echo $obj;                              // Output: This is an instance of MyClass

echo "<br><br>";

// __invoke()
echo "<strong>__invoke()</strong><br>";
$obj(5);
echo "<br>";
var_dump(is_callable($obj));

echo "<br><br>";

// __clone()
echo "<strong>__clone()</strong>";
echo "<br>";
$obj2 = clone($obj);
echo "<br><br>";
var_dump($obj);
echo "<br>";
var_dump($obj2);
echo "<br><br>";

// __serialize()
echo "<strong>__serialize()</strong>";
echo "<br>";
echo "Serialized Object: " . serialize($obj) . "\n";
echo "<br><br>";

// __unserialize()
echo "<strong>__unserialize()</strong>";
echo "<br>";

// Display the unserialized object
echo "Unserialized Object: ";

var_dump(unserialize(serialize($obj)));

echo "<br><br>";

echo "<strong>__destruct()</strong><br>";
unset($obj);
