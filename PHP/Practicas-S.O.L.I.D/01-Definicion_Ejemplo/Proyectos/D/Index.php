<?php
require_once __DIR__ . '/Interfaces/INotificador.php';
require_once __DIR__ . '/Interfaces/ILogger.php';
require_once __DIR__ . '/Notificadores/NotificadorEmail.php';
require_once __DIR__ . '/Notificadores/NotificadorSMS.php';
require_once __DIR__ . '/Notificadores/NotificadorWhatsApp.php';
require_once __DIR__ . '/Loggers/ConsoleLogger.php';
require_once __DIR__ . '/Servicios/ServicioNotificaciones.php';

// Crear instancias de los notificadores
$notificadorEmail = new NotificadorEmail();
$notificadorSMS = new NotificadorSMS();
$notificadorWhatsApp = new NotificadorWhatsApp();
$logger = new ConsoleLogger();

// Crear servicios con diferentes notificadores
$servicioEmail = new ServicioNotificaciones($notificadorEmail, $logger);
$servicioSMS = new ServicioNotificaciones($notificadorSMS, $logger);
$servicioWhatsApp = new ServicioNotificaciones($notificadorWhatsApp, $logger);

echo "<h2>Sistema de Notificaciones</h2>";

// Enviar notificaciones por diferentes medios
echo "<h3>Enviando notificaciones a juan@ejemplo.com:</h3>";
$servicioEmail->enviarNotificacion("juan@ejemplo.com", "¡Bienvenido a nuestro servicio!");
$servicioSMS->enviarNotificacion("+1234567890", "Tu código de verificación es: 123456");
$servicioWhatsApp->enviarNotificacion("+1234567890", "¡Tu pedido está en camino!");