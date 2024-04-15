<?php class voidExampleClass{

    // void pseudo type = function never return value
    public function setDiscount(int|float $num) : void {
        echo '$this->discount = ' . $num . '<br>';
        $this->discount = $num;
    }

}


    $voidExampleClass = new voidExampleClass();
    $voidExampleClass->setDiscount(10);

    var_dump($voidExampleClass);

?>