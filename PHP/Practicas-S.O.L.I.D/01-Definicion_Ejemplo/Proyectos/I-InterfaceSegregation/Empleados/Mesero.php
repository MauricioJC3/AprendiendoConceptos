<?php

class Mesero implements IMesero, ILimpieza {
    public function tomarOrden(): string {
        return "El mesero está tomando la orden del cliente";
    }

    public function servirMesa(): string {
        return "El mesero está sirviendo los platos en la mesa";
    }

    public function procesarPago(): string {
        return "El mesero está procesando el pago con tarjeta";
    }

    public function limpiarArea(): string {
        return "El mesero está limpiando las mesas";
    }

    public function desinfectar(): string {
        return "El mesero está desinfectando las mesas y sillas";
    }
}