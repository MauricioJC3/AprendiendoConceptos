<?php
require_once __DIR__ . '/../Interface/CalculadorDescuentoInterface.php';

class DescuentoPremium implements CalculadorDescuentoInterface {
    public function calcularDescuento(float $precio): float {
        return $precio * 0.2; // 20% de descuento
    }
}