<?php

class SeasonalDiscount implements DiscountStrategy {
    public function calculateDiscount(Product $product): float {
        if ($product->getCategory() === "summer") {
            return $product->getPrice() * 0.30; // 30% para productos de verano
        }
        return $product->getPrice() * 0.15; // 15% para otros
    }
}