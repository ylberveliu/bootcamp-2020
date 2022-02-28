<?php 

interface ICar {
    public function getModel();
}

abstract class Car {
    protected $make;
    protected $mode;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    abstract public function getMake();
}

class SportCar extends Car {
    public function __construct($make, $model) {
        parent::__construct($make, $model);
    }

    public function getMake() {
        echo $this->make;
    }
}

$sc = new SportCar("Mercedes", "M1");