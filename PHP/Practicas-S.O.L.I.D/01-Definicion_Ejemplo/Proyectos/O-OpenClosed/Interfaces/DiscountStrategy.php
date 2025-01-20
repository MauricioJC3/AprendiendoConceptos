<?php

interface DiscountStrategy {
    public function calculateDiscount(Product $product): float;
}