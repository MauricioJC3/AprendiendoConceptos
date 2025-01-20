<?php

class NotificadorWhatsApp implements INotificador {
    public function enviar(string $destinatario, string $mensaje): string {
        // Simula envío de WhatsApp
        return "WhatsApp enviado a {$destinatario}: {$mensaje}";
    }
}