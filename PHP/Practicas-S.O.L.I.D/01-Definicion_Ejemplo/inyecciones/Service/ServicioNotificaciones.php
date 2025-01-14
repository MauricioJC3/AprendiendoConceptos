<?php

class ServicioNotificaciones 
{
    private $notificador;

    public function __construct(NotificacionInterface $notificador)
    {
        $this->notificador = $notificador;
    }

    public function alertaUsuario(string $mensaje)
    {
        $this->notificador->enviarNotificacion($mensaje);
    }
    
}