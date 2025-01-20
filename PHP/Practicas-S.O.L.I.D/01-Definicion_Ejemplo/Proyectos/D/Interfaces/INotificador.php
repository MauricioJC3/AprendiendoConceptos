<?php

interface INotificador {
    public function enviar(string $destinatario, string $mensaje): string;
}