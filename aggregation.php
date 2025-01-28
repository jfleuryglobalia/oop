<?php

class Wheel {
    private $size;

    public function __construct($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }
}

class Car {
    private $wheels = [];

    public function addWheel(Wheel $wheel) {
        // Add a wheel to the car.
        $this->wheels[] = $wheel;
    }

    public function getWheels() {
        // Return all the wheels associated with the car.
        return $this->wheels;
    }
}

// Aggregation: Wheels belong to a car, but they can exist independently.
$wheel1 = new Wheel(16);
$wheel2 = new Wheel(16);

$car = new Car();
$car->addWheel($wheel1);
$car->addWheel($wheel2);

echo 'The car has ' . count($car->getWheels()) . ' wheels.';
