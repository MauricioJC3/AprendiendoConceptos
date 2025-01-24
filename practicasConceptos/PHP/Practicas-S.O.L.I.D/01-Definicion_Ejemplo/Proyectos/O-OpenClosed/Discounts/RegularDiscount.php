<?php

class RegularDiscount implements DiscountStrategy {
    public function calculateDiscount(Product $product): float {
        return $product->getPrice() * 0.10; // 10% descuento
    }
}