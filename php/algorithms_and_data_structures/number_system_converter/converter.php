<?php
/*
    number system converter
    
        number      = 15,
        base_from   = 10,
        base_to     = 2,

        ret => 1111
        
    */

Class C{
    
    public $number;

    public function __construct(){
    }
    
    public function convert_num_to_array($number) : array{
        $array = [];
        while ($number > 0) {
            $array[] = $number % 10;
            $number = intval($number / 10); 
        }
        return array_reverse($array);
    }

    public function convert_to_decimal_based(int $number, int $base_from) : int{
        $array = $this->convert_num_to_array($number);
        $array = array_reverse($array);
        $array_new = [];
        $number_new = 0;
        for ($i=0;$i<count($array);$i++){
            $array_new[$i] = $array[$i] * $base_from**$i;
            $number_new += $array_new[$i];
        }
        return $number_new;
    }

    public function convert_from_base_to_base(int $number, int $base_from, int $base_to){

        if ($base_from != 10)
            $number = $this->convert_to_decimal_based($number, $base_from);

        //$array = $this->convert_num_to_array($number);

        $array_new = [];
        while ($number > 0) {
            $array_new[] = $number % $base_to;
            $number = intval($number / $base_to); 
        }

        $number_as_string = "";
        for ($i=0;$i<count($array_new);$i++)
            $number_as_string .= (string)$array_new[$i];
        return $number_as_string;

    }

}

// number,
// base_from,
// base_to,

$c = new C();
echo $c->convert_from_base_to_base(15,10,2);
