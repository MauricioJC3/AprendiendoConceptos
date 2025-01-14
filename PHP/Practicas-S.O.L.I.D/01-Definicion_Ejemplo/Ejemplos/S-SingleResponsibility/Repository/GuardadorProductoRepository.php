<?php
require_once __DIR__ . '/../Model/ProductoModel.php';

class GuardadorProducto {
    public function guardar(Producto $producto) {
        // Lógica para guardar en base de datos
        echo "Guardando producto: " . $producto->getNombre();
    }
}