<?php
require_once __DIR__ . '/Interfaces/ICocinero.php';
require_once __DIR__ . '/Interfaces/IMesero.php';
require_once __DIR__ . '/Interfaces/ILimpieza.php';
require_once __DIR__ . '/Empleados/ChefPrincipal.php';
require_once __DIR__ . '/Empleados/Mesero.php';
require_once __DIR__ . '/Empleados/Ayudante.php';
require_once __DIR__ . '/Restaurante/Restaurante.php';

// Crear el restaurante
$restaurante = new Restaurante();

// Crear empleados
$chef = new ChefPrincipal();
$mesero = new Mesero();
$ayudante = new Ayudante();

// Agregar empleados al restaurante
$restaurante->agregarEmpleado($chef);
$restaurante->agregarEmpleado($mesero);
$restaurante->agregarEmpleado($ayudante);

// Mostrar las actividades del restaurante
echo "<h2>Un Día en el Restaurante</h2>";

echo "<h3>Actividades del Chef:</h3>";
echo $chef->cocinar() . "<br>";
echo $chef->prepararIngredientes() . "<br>";
echo $chef->revisarCalidad() . "<br>";

echo "<h3>Actividades del Mesero:</h3>";
echo $mesero->tomarOrden() . "<br>";
echo $mesero->servirMesa() . "<br>";
echo $mesero->procesarPago() . "<br>";
echo $mesero->limpiarArea() . "<br>";
echo $mesero->desinfectar() . "<br>";

echo "<h3>Actividades del Ayudante:</h3>";
echo $ayudante->limpiarArea() . "<br>";
echo $ayudante->desinfectar() . "<br>";

echo "<h3>Inicio del Servicio:</h3>";
$actividades = $restaurante->iniciarServicio();
foreach ($actividades as $actividad) {
    echo $actividad . "<br>";
}