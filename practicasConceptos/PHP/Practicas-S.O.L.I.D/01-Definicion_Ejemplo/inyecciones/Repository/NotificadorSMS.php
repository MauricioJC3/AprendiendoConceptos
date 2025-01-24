<?php
require_once __DIR__ . '/../Interfaces/NotificadorInterface.php';

class NotificadorSMS implements NotificacionInterface
{
    public function enviarNotificacion(string $mensaje)
    {
        echo "Enviando notificacion por SMS: $mensaje";
    }
}