<?php
    
    // mixed type
    // ... scalar var
    //
    // The mixed type accepts every value. 
    // It is equivalent to the union type 
    // object|resource|array|string|float|int|bool|null. Available as of PHP 8.0.0.
    // mixed is, in type theory parlance, the top type. 
    /// Meaning every other type is a subtype of it.
    
    class mixedClassExample {
        public mixed $exampleProperty;
        public function foo(mixed ...$foo) {
            print_r($foo);
        }
    }

    $m = new mixedClassExample();
    $m->foo(10, 'string', []);

?>