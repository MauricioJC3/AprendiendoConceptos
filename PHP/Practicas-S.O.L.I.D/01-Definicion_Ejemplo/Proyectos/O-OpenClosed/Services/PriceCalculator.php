<?php

class PriceCalculator {
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function calculateFinalPrice(Product $product): float {
        $discount = $this->discountStrategy->calculateDiscount($product);
        return $product->getPrice() - $discount;
    }
}