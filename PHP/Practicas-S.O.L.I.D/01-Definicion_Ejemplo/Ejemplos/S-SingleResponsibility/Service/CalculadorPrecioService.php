<?php
require_once __DIR__ . '/../Model/ProductoModel.php';

class CalculadorPrecio {
    public function calcularPrecioConIVA(Producto $producto): float {
        return $producto->getPrecio() * 1.21;
    }
}