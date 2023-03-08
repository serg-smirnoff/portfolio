<?php
    
    // final class
    final class E{
    }
    
    class D extends E {
        public function example(){
            return true;
        }
    }
    
    $e = new D();
    
    // Fatal error: Class D may not inherit from final class (E) 
    var_dump($e);

?>