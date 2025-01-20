<?php

class ServicioNotificaciones {
    private $notificador;
    private $logger;

    public function __construct(INotificador $notificador, ILogger $logger) {
        $this->notificador = $notificador;
        $this->logger = $logger;
    }

    public function enviarNotificacion(string $destinatario, string $mensaje): void {
        $resultado = $this->notificador->enviar($destinatario, $mensaje);
        $this->logger->registrar($resultado);
    }
}