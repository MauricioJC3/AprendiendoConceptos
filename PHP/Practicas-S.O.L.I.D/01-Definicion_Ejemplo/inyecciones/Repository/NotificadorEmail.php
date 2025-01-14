<?php
require_once __DIR__ . '/../Interfaces/NotificadorInterface.php';

class NotificadorEmail implements NotificacionInterface
{
    public function enviarNotificacion(string $mensaje)
    {
        echo "Enviando notificacion por email: $mensaje";
    }
} 