<?php

class Restaurante {
    private $empleados = [];

    public function agregarEmpleado($empleado): void {
        $this->empleados[] = $empleado;
    }

    public function iniciarServicio(): array {
        $actividades = [];

        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof ICocinero) {
                $actividades[] = $empleado->cocinar();
                $actividades[] = $empleado->prepararIngredientes();
            }
            if ($empleado instanceof IMesero) {
                $actividades[] = $empleado->tomarOrden();
                $actividades[] = $empleado->servirMesa();
            }
            if ($empleado instanceof ILimpieza) {
                $actividades[] = $empleado->limpiarArea();
            }
        }

        return $actividades;
    }
}