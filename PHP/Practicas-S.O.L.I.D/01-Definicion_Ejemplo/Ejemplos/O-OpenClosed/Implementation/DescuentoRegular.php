<?php
require_once __DIR__ . '/../Interface/CalculadorDescuentoInterface.php';

class DescuentoRegular implements CalculadorDescuentoInterface {
    public function calcularDescuento(float $precio): float {
        return $precio * 0.1; // 10% de descuento
    }
}