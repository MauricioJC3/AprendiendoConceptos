<?php
require_once __DIR__ . '/Shapes/Shape.php';
require_once __DIR__ . '/Shapes/Rectangle.php';
require_once __DIR__ . '/Shapes/Square.php';
require_once __DIR__ . '/Shapes/Circle.php';
require_once __DIR__ . '/Services/AreaCalculator.php';

// Crear instancias de diferentes formas
$rectangle = new Rectangle(4, 5);
$square = new Square(5);
$circle = new Circle(3);

// Crear calculador y agregar formas
$calculator = new AreaCalculator();
$calculator->addShape($rectangle);
$calculator->addShape($square);
$calculator->addShape($circle);

// Mostrar resultados
echo "<h2>Demostración del Principio de Sustitución de Liskov</h2>";

echo "<h3>Áreas individuales:</h3>";
echo "Rectángulo (4x5): " . $rectangle->getArea() . "<br>";
echo "Cuadrado (5x5): " . $square->getArea() . "<br>";
echo "Círculo (radio 3): " . number_format($circle->getArea(), 2) . "<br>";

echo "<h3>Perímetros individuales:</h3>";
echo "Rectángulo: " . $rectangle->getPerimeter() . "<br>";
echo "Cuadrado: " . $square->getPerimeter() . "<br>";
echo "Círculo: " . number_format($circle->getPerimeter(), 2) . "<br>";

echo "<h3>Totales:</h3>";
echo "Área total: " . number_format($calculator->getTotalArea(), 2) . "<br>";
echo "Perímetro total: " . number_format($calculator->getTotalPerimeter(), 2) . "<br>";