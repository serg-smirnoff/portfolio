<?php 
function inverse($num) {
    if (!$num % 2 == 0) {
        // ErrorException($message, 0, $severity, $filename, $lineno);
        throw new Exception('Exception message',10);
    }
    return $num % 2;
}
try {
    inverse(3) . "\n";
} catch (Exception $e) {
    echo "getMessage        = " . $e->getMessage() . "<br>";
    echo "getCode           = " . $e->getCode() . "<br>";
    // echo "getFile           = " . $e->getFile() . "<br>";
    echo "getLine           = " . $e->getLine() . "<br>";
    // echo "getPrevious       = " . $e->getPrevious() . "<br>";
    // echo "getTrace          = " . $e->getTrace() . "<br>";
    // echo "getTraceAsString  = " . $e->getTraceAsString() . "<br>";
    // echo "__toString        = " . $e->__toString() . "<br>";
}
?>