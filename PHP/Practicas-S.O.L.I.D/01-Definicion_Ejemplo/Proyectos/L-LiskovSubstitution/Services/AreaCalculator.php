<?php

class AreaCalculator {
    private $shapes;

    public function __construct(array $shapes = []) {
        $this->shapes = $shapes;
    }

    public function addShape(Shape $shape): void {
        $this->shapes[] = $shape;
    }

    public function getTotalArea(): float {
        $area = 0;
        foreach ($this->shapes as $shape) {
            $area += $shape->getArea();
        }
        return $area;
    }

    public function getTotalPerimeter(): float {
        $perimeter = 0;
        foreach ($this->shapes as $shape) {
            $perimeter += $shape->getPerimeter();
        }
        return $perimeter;
    }
}