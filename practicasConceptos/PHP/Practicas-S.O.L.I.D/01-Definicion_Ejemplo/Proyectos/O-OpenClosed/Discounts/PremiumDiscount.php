<?php

class PremiumDiscount implements DiscountStrategy {
    public function calculateDiscount(Product $product): float {
        return $product->getPrice() * 0.20; // 20% descuento
    }
} 