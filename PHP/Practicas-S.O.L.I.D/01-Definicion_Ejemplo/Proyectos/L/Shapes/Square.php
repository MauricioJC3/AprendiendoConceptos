<?php

class Square extends Shape {
    private $side;

    public function __construct(float $side) {
        $this->side = $side;
    }

    public function getSide(): float {
        return $this->side;
    }

    public function setSide(float $side): void {
        $this->side = $side;
    }

    public function getArea(): float {
        return $this->side * $this->side;
    }

    public function getPerimeter(): float {
        return 4 * $this->side;
    }
}