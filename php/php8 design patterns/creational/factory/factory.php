<?php

/* factory design pattern
*/

class Computer{

    private string $type;
    private string $model;

    public function __construct($type,$model){
        $this->type = $type;
        $this->model = $model;
    }

    public function getComputer(){
        return $this->type . ' ' . $this->model;
    }

}

class ComputerFactory{

    public function getComputerCustom($type,$model) {
        return new Computer($type, $model);
    }
    
    public function getComputerPC() {
        return new Computer("PC","Intel Pentium");
    }
    
    public function getComputerApple() {
        return new Computer("Apple","Mac");
    }

}

function dd($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

$factory = new ComputerFactory();
$computer = $factory->getComputerCustom('PC','Intel Pentium');
dd($computer);

$computer = $factory->getComputerPC();
dd($computer);

$computer = $factory->getComputerApple();
dd($computer);
