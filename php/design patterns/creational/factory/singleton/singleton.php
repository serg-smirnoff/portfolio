<?php

class Singleton{

    private $instance;

    public function getInstance(){

        if (empty($instance)){
            $this->instance = $this;
        }

        return $this->instance;

    }

}

$singleton = new Singleton();

var_dump($singleton);

$singleton->getInstance();

var_dump($singleton);