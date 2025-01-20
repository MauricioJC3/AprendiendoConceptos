<?php

class Circle extends Shape {
    private $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }

    public function getArea(): float {
        return pi() * $this->radius * $this->radius;
    }

    public function getPerimeter(): float {
        return 2 * pi() * $this->radius;
    }
}