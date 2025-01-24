<?php
require_once __DIR__ . '/Models/Products.php';
require_once __DIR__ . '/Interfaces/DiscountStrategy.php';
require_once __DIR__ . '/Discounts/RegularDiscount.php';
require_once __DIR__ . '/Discounts/PremiumDiscount.php';
require_once __DIR__ . '/Discounts/SeasonalDiscount.php';
require_once __DIR__ . '/Services/PriceCalculator.php';

// Crear productos de ejemplo
$shirt = new Product("Camisa de Verano", 100.00, "summer");
$pants = new Product("Pantalón", 80.00, "regular");

// Crear calculadores con diferentes estrategias de descuento
$regularCalculator = new PriceCalculator(new RegularDiscount());
$premiumCalculator = new PriceCalculator(new PremiumDiscount());
$seasonalCalculator = new PriceCalculator(new SeasonalDiscount());

// Calcular precios con diferentes descuentos
echo "<h2>Cálculo de Precios con Diferentes Descuentos</h2>";

echo "<h3>Producto: {$shirt->getName()} - Precio Original: \${$shirt->getPrice()}</h3>";
echo "Precio con descuento regular: \$" . number_format($regularCalculator->calculateFinalPrice($shirt), 2) . "<br>";
echo "Precio con descuento premium: \$" . number_format($premiumCalculator->calculateFinalPrice($shirt), 2) . "<br>";
echo "Precio con descuento de temporada: \$" . number_format($seasonalCalculator->calculateFinalPrice($shirt), 2) . "<br>";

echo "<h3>Producto: {$pants->getName()} - Precio Original: \${$pants->getPrice()}</h3>";
echo "Precio con descuento regular: \$" . number_format($regularCalculator->calculateFinalPrice($pants), 2) . "<br>";
echo "Precio con descuento premium: \$" . number_format($premiumCalculator->calculateFinalPrice($pants), 2) . "<br>";
echo "Precio con descuento de temporada: \$" . number_format($seasonalCalculator->calculateFinalPrice($pants), 2) . "<br>";