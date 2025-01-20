<?php

class Ayudante implements ILimpieza {
    public function limpiarArea(): string {
        return "El ayudante está limpiando la cocina";
    }

    public function desinfectar(): string {
        return "El ayudante está desinfectando las superficies de trabajo";
    }
}