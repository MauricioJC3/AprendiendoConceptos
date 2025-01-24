<?php

class NotificadorSMS implements INotificador {
    public function enviar(string $destinatario, string $mensaje): string {
        // Simula envío de SMS
        return "SMS enviado a {$destinatario}: {$mensaje}";
    }
}