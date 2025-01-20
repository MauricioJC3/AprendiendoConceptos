<?php

class ConsoleLogger implements ILogger {
    public function registrar(string $mensaje): void {
        echo "LOG: {$mensaje}<br>";
    }
}