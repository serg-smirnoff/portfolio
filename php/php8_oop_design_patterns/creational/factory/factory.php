<?php

// include dd() like laravel and dump() like symfony
require_once '/var/www/webdev/examples/php/vendor/autoload.php';

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

$factory = new ComputerFactory();
dump($factory);

$computer = $factory->getComputerCustom('PC','Intel Pentium');
dump($computer);

$computer = $factory->getComputerPC();
dump($computer);

$computer = $factory->getComputerApple();
dump($computer);
