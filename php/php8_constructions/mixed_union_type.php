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
        
        // mixed
        public function mixedExampleMethod(mixed ...$bar) {
            print_r($bar);
        }
        
        // union
        public function unionExampleMethod(string|bool|null $bar) {
            print_r($bar);
        }

    }

    // mixed
    $mixed = new mixedClassExample();
    // mixed + scalar types
    $mixed->mixedExampleMethod(10, 'string', []);
    
    // union
    $union = new mixedClassExample();
    
    // incorrect type array
    // Fatal error: Uncaught TypeError: mixedClassExample::unionExampleMethod(): Argument #1 ($bar) must be of type string|bool|null, array given, called in
    // $union->unionExampleMethod(['1','2']);
    // var_dump($union);
    
    // correct type sting of union string|bool|null

    $union->unionExampleMethod('string');
    var_dump($union);

?>