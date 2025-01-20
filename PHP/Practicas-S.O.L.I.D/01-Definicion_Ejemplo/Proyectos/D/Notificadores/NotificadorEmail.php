<?php

class NotificadorEmail implements INotificador {
    public function enviar(string $destinatario, string $mensaje): string {
        // Simula envío de email
        return "Email enviado a {$destinatario}: {$mensaje}";
    }
}
