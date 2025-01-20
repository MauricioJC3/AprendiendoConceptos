<?php

class Product {
    private $name;
    private $price;
    private $category;

    public function __construct(string $name, float $price, string $category) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getCategory(): string {
        return $this->category;
    }
}